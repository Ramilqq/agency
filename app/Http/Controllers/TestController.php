<?php

namespace App\Http\Controllers;

use Biplane\YandexDirect\Api\V4\Contract\AccountManagementRequest;
use Biplane\YandexDirect\Api\V4\Contract\AccountSelectionCriteria;
use Biplane\YandexDirect\Api\V4\YandexAPIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Biplane\YandexDirect\ApiServiceFactory;
use Biplane\YandexDirect\Api\V5\Ads;
use Biplane\YandexDirect\Api\V5\AgencyClients;
use Biplane\YandexDirect\Api\V5\Clients;
use Biplane\YandexDirect\Api\V5\Contract;
use Biplane\YandexDirect\Api\V5\Contract\ClientNotificationAdd;
use Biplane\YandexDirect\Api\V5\Contract\TinInfoAdd;
use Biplane\YandexDirect\ConfigBuilder;

class TestController extends Controller
{
    public $test_token = "y0_AgAAAAB2DBcJAAwsdQAAAAEMlawLAADguahdLKlN1rd5HGiCNyqWDckb1A";
    public $test_login = 'mskconsultadv';
    public $test_master_token = '0gcHvOQJVXwaKCMJ';

    public function test(){
        
        //--- Входные данные -------------------------------------------------------------------------//
        // Адрес сервиса Campaigns для отправки JSON-запросов (регистрозависимый)
        //https://api-sandbox.direct.yandex.com/json/v5/%7B%D1%81%D0%B5%D1%80%D0%B2%D0%B8%D1%81%7D

        $url = 'https://api-sandbox.direct.yandex.com/json/v5/agencyclients';
        // OAuth-токен пользователя, от имени которого будут выполняться запросы
        $token = 'y0_AgAAAAB2DBcJAAwsdQAAAAEMlawLAADguahdLKlN1rd5HGiCNyqWDckb1A';
        // Логин клиента рекламного агентства
        // Обязательный параметр, если запросы выполняются от имени рекламного агентства
        $clientLogin = '';
        
        //--- Подготовка и выполнение запроса -----------------------------------//
        // Установка HTTP-заголовков запроса
        $headers = array(
            "Authorization: Bearer $token",                   // OAuth-токен. Использование слова Bearer обязательно
            "Client-Login: $clientLogin",                     // Логин клиента рекламного агентства
            "Accept-Language: ru",                            // Язык ответных сообщений
            "Content-Type: application/json; charset=utf-8"   // Тип данных и кодировка запроса
        );

        // Параметры запроса к серверу API Директа
        $params = array(
            'method' => 'GetClientsList',                                // Используемый метод сервиса Campaigns
            'params' => array(
                'SelectionCriteria' => (object) array(),      // Критерий отбора кампаний. Для получения всех кампаний должен быть пустым
                'FieldNames' => array('Id', 'Name')           // Названия параметров, которые требуется получить
            )
        );
        $params_json = '{
            "method": "get",
            "params": { 
                "SelectionCriteria": {  
                    "Logins": [(string), ... ],
                    "Archived": ( "YES" | "NO" )
                }, /* required */   
                "FieldNames": [( "AccountQuality" | "Archived" | "ClientId" | "ClientInfo" | "CountryId" | "CreatedAt" | "Currency" | "Grants" | "Bonuses" | "Login" | "Notification" | "OverdraftSumAvailable" | "Phone" | "Representatives" | "Restrictions" | "Settings" | "Type" | "VatRate" | "ForbiddenPlatform" | "AvailableCampaignTypes" ), ... ], /* required */
                "TinInfoFieldNames" : [( "TinType" | "Tin"), ... ],
                "OrganizationFieldNames": [( "Name" | "EpayNumber" | "RegNumber" | "OksmNumber" | "OkvedCode" ), ... ],
                "ContractFieldNames": [( "Number" | "Date" | "Price" | "Type" | "ActionType" | "SubjectType" ), ... ],
                "ContragentFieldNames": [( "Name" | "Phone" | "EpayNumber" | "RegNumber" | "OksmNumber" ), ... ],
                "ContragentTinInfoFieldNames": [( "TinType" | "Tin" ), ... ],
                "Page": {  
                "Limit": 1,
                "Offset": 1
                }
            }
        }';

        $params_json = [
            'method'=>'get',
            'params'=>[
                'SelectionCriteria' => ['Logins' => [], 'Archived' => 'NO'],
                'FieldNames' => ['ClientId'],
                'TinInfoFieldNames' => [],
                'OrganizationFieldNames' => [],
                'ContractFieldNames' => [],
                'ContragentFieldNames' => [],
                'ContragentTinInfoFieldNames' => [],
                'Page' => [
                    'Limit' => 10,
                    'Offset' => 0,
                ],
            ]
        ];


        $params_json = json_encode($params_json);
        //dd(json_encode($params_json));
        // Преобразование входных параметров запроса в формат JSON
        $body = json_encode($params, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // Инициализация cURL
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params_json);

        /*
        Для полноценного использования протокола HTTPS можно включить проверку SSL-сертификата сервера API Директа.
        Чтобы включить проверку, установите опцию CURLOPT_SSL_VERIFYPEER в true, а также раскомментируйте строку с опцией CURLOPT_CAINFO и укажите путь к локальной копии корневого SSL-сертификата. 
        */
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($curl, CURLOPT_CAINFO, getcwd().'\CA.pem');

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // Выполнение запроса, получение результата
        $result = curl_exec($curl);
        //dd($result);

        //--- Обработка результата выполнения запроса ---------------------------//
        if(!$result) { echo ('Ошибка cURL: '.curl_errno($curl).' - '.curl_error($curl)); }
        else {
        // Разделение HTTP-заголовков и тела ответа
        $responseHeadersSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $responseHeaders = substr($result, 0, $responseHeadersSize);
        $responseBody = substr($result, $responseHeadersSize);
            
        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) != 200) { echo "HTTP-ошибка: ".curl_getinfo($curl, CURLINFO_HTTP_CODE); }
        else {
            // Преобразование ответа из формата JSON
            $responseBody = json_decode($responseBody);

            

            if (isset($responseBody->error)) {
                $apiErr = $responseBody->error;
                echo "Ошибка API {$apiErr->error_code}: {$apiErr->error_string} - {$apiErr->error_detail} (RequestId: {$apiErr->request_id})";
            }
            else {
                // Извлечение HTTP-заголовков ответа: RequestId (Id запроса) и Units (информация о баллах)
                $responseHeadersArr = explode("\r\n", $responseHeaders);
                foreach ($responseHeadersArr as $header) {
                    if (preg_match('/(RequestId|Units):/', $header)) { echo "$header <br>"; }
                }

                

                // Вывод списка рекламных кампаний
                foreach ($responseBody->result->Clients as $campaign) {
                    //echo "Рекламная кампания: {$campaign->Name} ({$campaign->Id})<br>";

                    echo "Clients: <pre>" . print_r($campaign, 1) . "</pre><br>";
                }
            }
        }
        }

        //--- Отладочная информация ---------------------------------------------//
        //echo "<hr>Заголовки запроса: <pre>".curl_getinfo($curl, CURLINFO_HEADER_OUT)."</pre>";
        //echo "Запрос: <pre>".json_encode($params, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."</pre>";
        //echo "Заголовки ответа: <pre>".$responseHeaders."</pre>";
        //echo "Ответ: <pre>".json_encode($responseBody, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."</pre>";

        curl_close($curl);
    }

    public function getAgencyClients(){
        
        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox(true)
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
                Contract\AgencyClientFieldEnum::CLIENT_ID,
                Contract\AgencyClientFieldEnum::LOGIN,
            ])->setTinInfoFieldNames([
                'TinType', 'Tin'
            ]);

        $response = $service->get($request);
        dd($response->getClients());

        foreach ($response->getClients() ?? [] as $item) {
            // Здесь $item будет являться экземпляром `Biplane\YandexDirect\Api\V5\Contract\AdGetItem`
            // Например, получение информации о возрастной метке:
            // $item->getAgeLabel();

            dd($item);
        }
    }

    public function clients(){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox(true)
            ->setAccessToken($this->test_token)
            //->setClientLogin('103613')
            ->setLocale('ru')
            ->getConfig();
            
        $service = $serviceFactory->createService($config, Clients::class);

        $request = Contract\GetClientsRequest::create()
            ->setFieldNames([
                Contract\ClientFieldEnum::CLIENT_ID,
                Contract\ClientFieldEnum::CLIENT_INFO,
                Contract\ClientFieldEnum::LOGIN,
            ]);

        $response = $service->get($request);
        dd($response->getClients());


    }

    

    public function addAgencyClients(){
        
        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox(true)
            ->setAccessToken($this->test_token)
            ->setClientLogin('')
            ->setLocale('ru')
            ->getConfig();

        $service = $serviceFactory->createService($config, AgencyClients::class);

        $notification = new ClientNotificationAdd;
        $notification->create();
        $notification->setEmail('TestApi@mail.ru')->setLang('RU')->setEmailSubscriptions(['Option'=>'RECEIVE_RECOMMENDATIONS', 'Value'=>'NO']);
        
        $tenType = new TinInfoAdd;
        $tenType = $tenType->create();
        $tenType->setTinType('INDIVIDUAL');
        $tenType->setTin('123123');
        //dd($tenType);
        
        $request = Contract\AddAgencyClientsRequest::create()
            ->setLogin('TestApi2')
            ->setFirstName('FirstTest2')
            ->setLastName('LastTestApi2')
            ->setCurrency('RUB')
            ->setNotification($notification)
            ->setSettings(['Option'=>'CORRECT_TYPOS_AUTOMATICALLY', 'Value'=>'NO'])
            ->setTinInfo($tenType);

        dd($request);

        $response = $service->add($request);

        dd($response);
        /*

        +"Login": "TestApi2"
        +"Password": "1JqENt63PJPOE5P8FhTR"
        +"Email": "testapi2@yandex.ru"
        +"ClientId": 103648

        */
    }

    public function setAccountManagement(){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox(true)
            ->setAccessToken($this->test_token)
            ->setMasterToken($this->test_master_token)
            ->setClientLogin($this->test_login)
            ->setLocale('ru')
            ->getConfig();

        $service = $serviceFactory->createService($config, YandexAPIService::class);

        $criteria = AccountSelectionCriteria::create()
            ->setAccountIDS(['103613'])
            ->setLogins([]);

        $request = AccountManagementRequest::create()
        //->setSelectionCriteria($criteria)
        ->setAction('Invoice')
        ->setPayments([
            'AccountID' => '103613',
            'Amount' => '100',
            'Currency' => 'RUB',
        ]);
        

        //dd($request);
        $response = $service->accountManagement($request);
        dd($response);

    }

    














}
