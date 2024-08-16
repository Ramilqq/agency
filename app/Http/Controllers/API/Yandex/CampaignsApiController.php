<?php

namespace App\Http\Controllers\API\Yandex;

use Biplane\YandexDirect\ApiServiceFactory;
use Biplane\YandexDirect\ConfigBuilder;
use Biplane\YandexDirect\Api\V5\Contract;
use Biplane\YandexDirect\Api\V5\Campaigns;

class CampaignsApiController extends BaseApiController
{
    public function getCampaigns($ids = []){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        
        $service = $serviceFactory->createService($config, Campaigns::class);

        $criteria = Contract\CampaignsSelectionCriteria::create()
        ->setIds($ids);

        $request = Contract\GetCampaignsRequest::create()
        ->setSelectionCriteria($criteria)
        ->setFieldNames([
            Contract\CampaignFieldEnum::BLOCKED_IPS,
            Contract\CampaignFieldEnum::EXCLUDED_SITES,
            Contract\CampaignFieldEnum::CURRENCY,
            Contract\CampaignFieldEnum::DAILY_BUDGET,
            Contract\CampaignFieldEnum::NOTIFICATION,
            Contract\CampaignFieldEnum::END_DATE,
            Contract\CampaignFieldEnum::FUNDS,
            Contract\CampaignFieldEnum::CLIENT_INFO,
            Contract\CampaignFieldEnum::ID,
            Contract\CampaignFieldEnum::NAME,
            Contract\CampaignFieldEnum::NEGATIVE_KEYWORDS,
            Contract\CampaignFieldEnum::REPRESENTED_BY,
            Contract\CampaignFieldEnum::START_DATE,
            Contract\CampaignFieldEnum::STATISTICS,
            Contract\CampaignFieldEnum::STATE,
            Contract\CampaignFieldEnum::STATUS,
            Contract\CampaignFieldEnum::STATUS_PAYMENT,
            Contract\CampaignFieldEnum::STATUS_CLARIFICATION,
            Contract\CampaignFieldEnum::SOURCE_ID,
            Contract\CampaignFieldEnum::TIME_TARGETING,
            Contract\CampaignFieldEnum::TIME_ZONE,
            Contract\CampaignFieldEnum::TYPE,
        ])
        ->setTextCampaignFieldNames([
            /*Contract\TextCampaignFieldEnum::COUNTER_IDS,
            Contract\TextCampaignFieldEnum::RELEVANT_KEYWORDS,
            Contract\TextCampaignFieldEnum::SETTINGS,
            Contract\TextCampaignFieldEnum::BIDDING_STRATEGY,
            Contract\TextCampaignFieldEnum::PRIORITY_GOALS,
            Contract\TextCampaignFieldEnum::TRACKING_PARAMS,
            Contract\TextCampaignFieldEnum::ATTRIBUTION_MODEL,
            Contract\TextCampaignFieldEnum::PACKAGE_BIDDING_STRATEGY,
            Contract\TextCampaignFieldEnum::CAN_BE_USED_AS_PACKAGE_BIDDING_STRATEGY_SOURCE,
            Contract\TextCampaignFieldEnum::NEGATIVE_KEYWORD_SHARED_SET_IDS,*/
        ])
        ->setTextCampaignSearchStrategyPlacementTypesFieldNames([
            /*Contract\TextCampaignSearchStrategyPlacementTypesFieldEnum::SEARCH_RESULTS,
            Contract\TextCampaignSearchStrategyPlacementTypesFieldEnum::PRODUCT_GALLERY,*/
        ])
        ->setMobileAppCampaignFieldNames([
            /*Contract\MobileAppCampaignFieldEnum::SETTINGS,
            Contract\MobileAppCampaignFieldEnum::BIDDING_STRATEGY,
            Contract\MobileAppCampaignFieldEnum::PACKAGE_BIDDING_STRATEGY,
            Contract\MobileAppCampaignFieldEnum::CAN_BE_USED_AS_PACKAGE_BIDDING_STRATEGY_SOURCE,
            Contract\MobileAppCampaignFieldEnum::NEGATIVE_KEYWORD_SHARED_SET_IDS,*/
        ])
        ->setDynamicTextCampaignFieldNames([
            /*Contract\DynamicTextCampaignFieldEnum::PLACEMENT_TYPES,
            Contract\DynamicTextCampaignFieldEnum::COUNTER_IDS,
            Contract\DynamicTextCampaignFieldEnum::SETTINGS,
            Contract\DynamicTextCampaignFieldEnum::BIDDING_STRATEGY,
            Contract\DynamicTextCampaignFieldEnum::PRIORITY_GOALS,
            Contract\DynamicTextCampaignFieldEnum::TRACKING_PARAMS,
            Contract\DynamicTextCampaignFieldEnum::ATTRIBUTION_MODEL,
            Contract\DynamicTextCampaignFieldEnum::PACKAGE_BIDDING_STRATEGY,
            Contract\DynamicTextCampaignFieldEnum::CAN_BE_USED_AS_PACKAGE_BIDDING_STRATEGY_SOURCE,
            Contract\DynamicTextCampaignFieldEnum::NEGATIVE_KEYWORD_SHARED_SET_IDS,*/
        ])
        ->setCpmBannerCampaignFieldNames([
            /*Contract\CpmBannerCampaignFieldEnum::COUNTER_IDS,
            Contract\CpmBannerCampaignFieldEnum::FREQUENCY_CAP,
            Contract\CpmBannerCampaignFieldEnum::VIDEO_TARGET,
            Contract\CpmBannerCampaignFieldEnum::SETTINGS,
            Contract\CpmBannerCampaignFieldEnum::BIDDING_STRATEGY,*/
        ])
        ->setSmartCampaignFieldNames([
            /*Contract\SmartCampaignFieldEnum::COUNTER_ID,
            Contract\SmartCampaignFieldEnum::SETTINGS,
            Contract\SmartCampaignFieldEnum::BIDDING_STRATEGY,
            Contract\SmartCampaignFieldEnum::PRIORITY_GOALS,
            Contract\SmartCampaignFieldEnum::TRACKING_PARAMS,
            Contract\SmartCampaignFieldEnum::ATTRIBUTION_MODEL,
            Contract\SmartCampaignFieldEnum::PACKAGE_BIDDING_STRATEGY,
            Contract\SmartCampaignFieldEnum::CAN_BE_USED_AS_PACKAGE_BIDDING_STRATEGY_SOURCE,*/
        ])
        ->setUnifiedCampaignFieldNames([
            /*Contract\UnifiedCampaignFieldEnum::COUNTER_IDS,
            Contract\UnifiedCampaignFieldEnum::SETTINGS,
            Contract\UnifiedCampaignFieldEnum::BIDDING_STRATEGY,
            Contract\UnifiedCampaignFieldEnum::PRIORITY_GOALS,
            Contract\UnifiedCampaignFieldEnum::TRACKING_PARAMS,
            Contract\UnifiedCampaignFieldEnum::ATTRIBUTION_MODEL,
            Contract\UnifiedCampaignFieldEnum::PACKAGE_BIDDING_STRATEGY,
            Contract\UnifiedCampaignFieldEnum::CAN_BE_USED_AS_PACKAGE_BIDDING_STRATEGY_SOURCE,
            Contract\UnifiedCampaignFieldEnum::NEGATIVE_KEYWORD_SHARED_SET_IDS,*/
        ])
        ->setUnifiedCampaignSearchStrategyPlacementTypesFieldNames([
            /*Contract\UnifiedCampaignSearchStrategyPlacementTypesFieldEnum::SEARCH_RESULTS,
            Contract\UnifiedCampaignSearchStrategyPlacementTypesFieldEnum::PRODUCT_GALLERY,*/
        ]);
        

        

        $response = $service->get($request);

        //dd($response->getCampaigns());
        return $response->getCampaigns();
    }

    public function addCampaigns(){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        
        $service = $serviceFactory->createService($config, Campaigns::class);

        $request = Contract\AddAdGroupsRequest::create()
        ->setAdGroups([
            'CampaignId' => 103648,
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
