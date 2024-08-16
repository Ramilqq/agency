<?php

namespace App\Http\Controllers\API\Yandex;

use Biplane\YandexDirect\ApiServiceFactory;
use Biplane\YandexDirect\ConfigBuilder;
use Biplane\YandexDirect\Api\V5\AdGroups;
use Biplane\YandexDirect\Api\V5\Contract;

class AdGroupsApiController extends BaseApiController
{
    public function getAdGroups($ids = []){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        
        $service = $serviceFactory->createService($config, AdGroups::class);

        $criteria = Contract\AdGroupsSelectionCriteria::create()
        ->setCampaignIds($ids);

        $request = Contract\GetAdGroupsRequest::create()
        ->setSelectionCriteria($criteria)
        ->setFieldNames([
            Contract\AdGroupFieldEnum::ID,
            Contract\AdGroupFieldEnum::CAMPAIGN_ID,
            Contract\AdGroupFieldEnum::STATUS,
            Contract\AdGroupFieldEnum::NAME,
            Contract\AdGroupFieldEnum::REGION_IDS,
            Contract\AdGroupFieldEnum::RESTRICTED_REGION_IDS,
            Contract\AdGroupFieldEnum::NEGATIVE_KEYWORDS,
            Contract\AdGroupFieldEnum::NEGATIVE_KEYWORD_SHARED_SET_IDS,
            Contract\AdGroupFieldEnum::TYPE,
            Contract\AdGroupFieldEnum::TRACKING_PARAMS,
            Contract\AdGroupFieldEnum::SUBTYPE,
            Contract\AdGroupFieldEnum::SERVING_STATUS,
        ]);

        $response = $service->get($request);
        
        //dd($response);
        return $response->getAdGroups();
    }

    public function addAdGroups(){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        
        $service = $serviceFactory->createService($config, AdGroups::class);

        $request = Contract\AddAdGroupsRequest::create()
        ->setAdGroups([
            'CampaignId' => 472576,
            'Name' => 'GroupTest_103648',
            'RegionIds' => '0',
            'NegativeKeywords' => [
                'Купить продать'
            ]
        ]);

        $response = $service->add($request);
        dd($response);
    }

}
