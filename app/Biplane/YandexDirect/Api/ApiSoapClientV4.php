<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api;

use Biplane\YandexDirect\Api\Finance\TransactionNumberGenerator;
use Biplane\YandexDirect\Api\Finance\TransactionNumberGenerator\ClockTransactionNumberGenerator;
use Biplane\YandexDirect\Api\V4\Contract\AccountManagementRequest;
use Biplane\YandexDirect\Config;
use Biplane\YandexDirect\Exception\ApiException;
use Biplane\YandexDirect\Soap\ApiSoapClient;
use LogicException;
use SoapFault;
use SoapHeader;

use function assert;
use function hash;
use function in_array;
use function is_string;
use function property_exists;
use function str_replace;
use function strpos;
use function strrpos;
use function substr;

class ApiSoapClientV4 extends ApiSoapClient
{
    private const API_NAMESPACE = 'API';
    private const ALT_NAMESPACES = ['http://namespaces.soaplite.com/perl'];

    /** @var TransactionNumberGenerator|null */
    private $transactionNumberGenerator;

    /**
     * @internal
     */
    public function getTransactionNumberGenerator(): TransactionNumberGenerator
    {
        if ($this->transactionNumberGenerator === null) {
            $this->transactionNumberGenerator = new ClockTransactionNumberGenerator();
        }

        return $this->transactionNumberGenerator;
    }

    /**
     * @internal
     */
    public function setTransactionNumberGenerator(TransactionNumberGenerator $generator): void
    {
        $this->transactionNumberGenerator = $generator;
    }

    /**
     * {@inheritdoc}
     *
     * @internal
     */
    public function __doRequest($request, $location, $action, $version, $oneWay = 0): ?string
    {
        $response = parent::__doRequest($request, $location, $action, $version, $oneWay);

        if ($response === null) {
            return null;
        }

        // Replace URI of some namespaces to fix mapping WSDL types to PHP classes
        foreach (self::ALT_NAMESPACES as $searchURI) {
            if (strpos($response, $searchURI) === false) {
                continue;
            }

            $response = str_replace($searchURI, self::API_NAMESPACE, $response);
        }

        return $response;
    }

    /**
     * {@inheritDoc}
     */
    public function __soapCall($name, $args, $options = null, $inputHeaders = null, &$outputHeaders = null)
    {
        $inputHeaders[] = new SoapHeader(self::API_NAMESPACE, 'locale', $this->config->getLocale(Config::API_4));
        $inputHeaders[] = new SoapHeader(self::API_NAMESPACE, 'token', $this->config->getAccessToken());

        if ($this->isFinancialMethod($name, $args)) {
            $usedMethod = $name;
            if ($name === 'AccountManagement') {
                //$usedMethod .= $args[0]->getAction();
                $usedMethod = 'AccountManagement';
            }

            $operationNum = $this->getTransactionNumberGenerator()->generate();
            $financeToken = $this->generateFinanceToken($usedMethod, $operationNum);

            $inputHeaders[] = new SoapHeader(self::API_NAMESPACE, 'finance_token', $financeToken);
            $inputHeaders[] = new SoapHeader(self::API_NAMESPACE, 'operation_num', $operationNum);
        }

        return parent::__soapCall($name, $args, $options, $inputHeaders, $outputHeaders);
    }

    protected function parseSoapFault(SoapFault $fault): ?ApiException
    {
        $code = 0;

        if ($fault->faultcode !== null) {
            $pos = strrpos($fault->faultcode, ':');

            if ($pos > 0) {
                $code = (int)substr($fault->faultcode, $pos + 1);
            }
        }

        if ($code > 0) {
            $detailMessage = property_exists($fault, 'detail') && is_string($fault->detail) ? $fault->detail : null;

            if ($detailMessage === '') {
                $detailMessage = null;
            }

            $exception = new ApiException($fault->faultstring, $code, $detailMessage, $fault);
            $requestId = $this->getRequestId();

            if ($requestId !== '') {
                $exception->setRequestId($requestId);
            }

            return $exception;
        }

        return null;
    }

    /**
     * @param array<mixed> $params
     */
    private function isFinancialMethod(string $methodName, array $params): bool
    {
        if ($methodName === 'AccountManagement') {
            $request = $params[0];
            assert($request instanceof AccountManagementRequest);

            if (in_array($request->getAction(), ['Deposit', 'Invoice', 'TransferMoney'], true)) {
                return true;
            }
        }

        return in_array(
            $methodName,
            [
                'TransferMoney',
                'GetCreditLimits',
                'CreateInvoice',
                'PayCampaigns',
            ],
            true
        );
    }

    private function generateFinanceToken(string $methodName, int $operationNum): string
    {
        if ($this->config->getMasterToken() === null) {
            throw new LogicException('The finance token cannot be created without the master token.');
        }

        if ($this->config->getClientLogin() === null) {
            throw new LogicException('The finance token cannot be created without the client login.');
        }


        /*dd(
            $this->config->getMasterToken() , $operationNum , $methodName , $this->config->getClientLogin(),hash(
                'sha256',
                $this->config->getMasterToken() . $operationNum . $methodName . $this->config->getClientLogin()
            )
        );*/

        return hash(
            'sha256',
            $this->config->getMasterToken() . $operationNum . $methodName . $this->config->getClientLogin()
        );
    }
}
