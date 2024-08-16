<?php

namespace App\Http\Controllers\API\Yandex;

use Biplane\YandexDirect\ApiServiceFactory;
use Biplane\YandexDirect\Api\V5\AgencyClients;
use Biplane\YandexDirect\Api\V5\Contract;
use Biplane\YandexDirect\Api\V5\Contract\ClientNotificationAdd;
use Biplane\YandexDirect\Api\V5\Contract\TinInfoAdd;
use Biplane\YandexDirect\ConfigBuilder;

class AgencyClientApiController extends BaseApiController
{
    public function get(){
        
        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin('')
            ->setLocale('ru')
            ->getConfig();
            
        $service = $serviceFactory->createService($config, AgencyClients::class);

        $criteria = Contract\AgencyClientsSelectionCriteria::create()
            ->setArchived('NO')
            ->setLogins([]);

        $request = Contract\GetAgencyClientsRequest::create()
            ->setSelectionCriteria($criteria)
            ->setFieldNames([
                Contract\AgencyClientFieldEnum::ACCOUNT_QUALITY,
                Contract\AgencyClientFieldEnum::ARCHIVED,
                Contract\AgencyClientFieldEnum::CLIENT_ID,
                Contract\AgencyClientFieldEnum::CLIENT_INFO,
                Contract\AgencyClientFieldEnum::COUNTRY_ID,
                Contract\AgencyClientFieldEnum::CREATED_AT,
                Contract\AgencyClientFieldEnum::CURRENCY,
                Contract\AgencyClientFieldEnum::GRANTS,
                Contract\AgencyClientFieldEnum::BONUSES,
                Contract\AgencyClientFieldEnum::LOGIN,
                Contract\AgencyClientFieldEnum::NOTIFICATION,
                Contract\AgencyClientFieldEnum::OVERDRAFT_SUM_AVAILABLE,
                Contract\AgencyClientFieldEnum::PHONE,
                Contract\AgencyClientFieldEnum::REPRESENTATIVES,
                Contract\AgencyClientFieldEnum::RESTRICTIONS,
                Contract\AgencyClientFieldEnum::SETTINGS,
                Contract\AgencyClientFieldEnum::TYPE,
                Contract\AgencyClientFieldEnum::VAT_RATE,
                Contract\AgencyClientFieldEnum::FORBIDDEN_PLATFORM,
                Contract\AgencyClientFieldEnum::AVAILABLE_CAMPAIGN_TYPES,
                Contract\AgencyClientFieldEnum::AVAILABLE_AD_GROUP_TYPES,
            ])->setTinInfoFieldNames([
                'TinType', 'Tin'
            ]);

        $response = $service->get($request);

        return $response->getClients();
    }

    public function add(array $data){
        
        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin('')
            ->setLocale('ru')
            ->getConfig();

        $service = $serviceFactory->createService($config, AgencyClients::class);

        $notification = new ClientNotificationAdd;
        $notification->create();
        $notification->setEmail($data['email'])->setLang('RU')->setEmailSubscriptions(['Option'=>'RECEIVE_RECOMMENDATIONS', 'Value'=>'NO']);
        
        $tenType = new TinInfoAdd;
        $tenType = $tenType->create();
        $tenType->setTinType($data['type']);
        $tenType->setTin($data['inn']);
        //dd($tenType);
        
        $request = Contract\AddAgencyClientsRequest::create()
            ->setLogin($data['login'])
            ->setFirstName($data['firstname'])
            ->setLastName($data['lastname'])
            ->setCurrency('RUB')
            ->setNotification($notification)
            ->setSettings(['Option'=>'CORRECT_TYPOS_AUTOMATICALLY', 'Value'=>'NO'])
            ->setTinInfo($tenType);

        
        try {
            $response = $service->add($request);
            $status = 'Success';
        } catch (\Throwable $th) {
            $response = $th->getMessage();
            $status = 'Error';
        }

        return ['status' => $status, 'data' => $response];
    }
}
