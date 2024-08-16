<?php

namespace App\Http\Controllers\API\Yandex;

use Biplane\YandexDirect\ApiServiceFactory;
use Biplane\YandexDirect\Api\V5\Ads;
use Biplane\YandexDirect\Api\V5\Contract;
use Biplane\YandexDirect\ConfigBuilder;

class AdsApiController extends BaseApiController
{
    public function getAds($id, $gid){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        $service = $serviceFactory->createService($config, Ads::class);

        $criteria = Contract\AdsSelectionCriteria::create()
            ->setCampaignIds([$id])
            ->setAdGroupIds([$gid]);
        
        $request = Contract\GetAdsRequest::create()
            ->setSelectionCriteria($criteria)
            ->setFieldNames([
                Contract\AdFieldEnum::AD_CATEGORIES,
                Contract\AdFieldEnum::AGE_LABEL,
                Contract\AdFieldEnum::AD_GROUP_ID,
                Contract\AdFieldEnum::CAMPAIGN_ID,
                Contract\AdFieldEnum::ID,
                Contract\AdFieldEnum::STATE,
                Contract\AdFieldEnum::STATUS,
                Contract\AdFieldEnum::STATUS_CLARIFICATION,
                Contract\AdFieldEnum::TYPE,
                Contract\AdFieldEnum::SUBTYPE,
            ]);

        $response = $service->get($request);

        //dd($response, $response->getAds());
        return $response->getAds();
    }

    public function addAds(){

        $serviceFactory = new ApiServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        $service = $serviceFactory->createService($config, Ads::class);

        $campaignsIds = [472575];

        $criteria = Contract\AdsSelectionCriteria::create()
            ->setCampaignIds($campaignsIds)
            ->setStates([
                Contract\StateEnum::ON,
            ]);
        $request = Contract\AddAdsRequest::create()
            ->setAds([
                'AdGroupId' => 4588679,
                'TextAd' => [
                    'Title' => 'Title',
                    'Title2' => 'Title2',
                    'Text' => 'Text',
                    'Mobile' => 'NO',
                    'Href' => 'https://yandex.ru/'
                ]
            ]);

        $response = $service->add($request);
        dd($response);
        foreach ($response->getAds() ?? [] as $item) {
            // Здесь $item будет являться экземпляром `Biplane\YandexDirect\Api\V5\Contract\AdGetItem`
            // Например, получение информации о возрастной метке:
            // $item->getAgeLabel();
            dd($item->getAgeLabel());
        }

    }
}
