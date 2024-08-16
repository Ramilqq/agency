<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5;

use Biplane\YandexDirect\Api\ApiSoapClientV5;
use Biplane\YandexDirect\Api\V5\Contract\AddAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\AddAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\ArchiveAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\ArchiveAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\DeleteAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\DeleteAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\GetAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\GetAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\ModerateAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\ModerateAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\ResumeAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\ResumeAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\SuspendAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\SuspendAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\UnarchiveAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\UnarchiveAdsResponse;
use Biplane\YandexDirect\Api\V5\Contract\UpdateAdsRequest;
use Biplane\YandexDirect\Api\V5\Contract\UpdateAdsResponse;
use Biplane\YandexDirect\Config;

/**
 * Auto-generated code.
 */
class Ads extends ApiSoapClientV5
{
    public const ENDPOINT = 'https://api.direct.yandex.com/v501/ads?wsdl';

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(Config $config, array $options)
    {
        $options['classmap'] = [
            'MobileAppAdActionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdActionEnum',
            'AdGroupTypesEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupTypesEnum',
            'StringConditionOperatorEnum' => 'Biplane\YandexDirect\Api\V5\Contract\StringConditionOperatorEnum',
            'AttributionModelEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AttributionModelEnum',
            'ExceptionNotification' => 'Biplane\YandexDirect\Api\V5\Contract\ExceptionNotification',
            'LimitOffset' => 'Biplane\YandexDirect\Api\V5\Contract\LimitOffset',
            'YesNoEnum' => 'Biplane\YandexDirect\Api\V5\Contract\YesNoEnum',
            'YesNoUnknownEnum' => 'Biplane\YandexDirect\Api\V5\Contract\YesNoUnknownEnum',
            'VideoTargetEnum' => 'Biplane\YandexDirect\Api\V5\Contract\VideoTargetEnum',
            'CurrencyEnum' => 'Biplane\YandexDirect\Api\V5\Contract\CurrencyEnum',
            'ConditionTypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\ConditionTypeEnum',
            'AdTargetStateSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdTargetStateSelectionEnum',
            'AdTargetsSelectionCriteria' => 'Biplane\YandexDirect\Api\V5\Contract\AdTargetsSelectionCriteria',
            'StateEnum' => 'Biplane\YandexDirect\Api\V5\Contract\StateEnum',
            'PriorityEnum' => 'Biplane\YandexDirect\Api\V5\Contract\PriorityEnum',
            'PositionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\PositionEnum',
            'CountryCodeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\CountryCodeEnum',
            'StatusEnum' => 'Biplane\YandexDirect\Api\V5\Contract\StatusEnum',
            'StatusSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\StatusSelectionEnum',
            'ExtensionStatusSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\ExtensionStatusSelectionEnum',
            'ScopeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\ScopeEnum',
            'AgeRangeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AgeRangeEnum',
            'GenderEnum' => 'Biplane\YandexDirect\Api\V5\Contract\GenderEnum',
            'MobileOperatingSystemTypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileOperatingSystemTypeEnum',
            'LangEnum' => 'Biplane\YandexDirect\Api\V5\Contract\LangEnum',
            'RepresentativeRoleEnum' => 'Biplane\YandexDirect\Api\V5\Contract\RepresentativeRoleEnum',
            'OperationEnum' => 'Biplane\YandexDirect\Api\V5\Contract\OperationEnum',
            'ServingStatusEnum' => 'Biplane\YandexDirect\Api\V5\Contract\ServingStatusEnum',
            'SerpLayoutEnum' => 'Biplane\YandexDirect\Api\V5\Contract\SerpLayoutEnum',
            'Statistics' => 'Biplane\YandexDirect\Api\V5\Contract\Statistics',
            'IncomeGradeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\IncomeGradeEnum',
            'IdsCriteria' => 'Biplane\YandexDirect\Api\V5\Contract\IdsCriteria',
            'GetRequestGeneral' => 'Biplane\YandexDirect\Api\V5\Contract\GetRequestGeneral',
            'GetResponseGeneral' => 'Biplane\YandexDirect\Api\V5\Contract\GetResponseGeneral',
            'ApiExceptionMessage' => 'Biplane\YandexDirect\Api\V5\Contract\ApiExceptionMessage',
            'ActionResultBase' => 'Biplane\YandexDirect\Api\V5\Contract\ActionResultBase',
            'ActionResult' => 'Biplane\YandexDirect\Api\V5\Contract\ActionResult',
            'SetBidsActionResult' => 'Biplane\YandexDirect\Api\V5\Contract\SetBidsActionResult',
            'MultiIdsActionResult' => 'Biplane\YandexDirect\Api\V5\Contract\MultiIdsActionResult',
            'ClientsActionResult' => 'Biplane\YandexDirect\Api\V5\Contract\ClientsActionResult',
            'ExtensionModeration' => 'Biplane\YandexDirect\Api\V5\Contract\ExtensionModeration',
            'SortOrderEnum' => 'Biplane\YandexDirect\Api\V5\Contract\SortOrderEnum',
            'AutotargetingCategoriesEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingCategoriesEnum',
            'AutotargetingCategory' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingCategory',
            'AutotargetingCategoryArray' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingCategoryArray',
            'AutotargetingBrandOptionsEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingBrandOptionsEnum',
            'AutotargetingBrandOption' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingBrandOption',
            'AutotargetingBrandOptionArray' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingBrandOptionArray',
            'AutotargetingCategories' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingCategories',
            'AutotargetingBrandOptions' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingBrandOptions',
            'AutotargetingSettings' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingSettings',
            'AutotargetingCategoriesFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingCategoriesFieldEnum',
            'AutotargetingBrandOptionsFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AutotargetingBrandOptionsFieldEnum',
            'AdExtensionTypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionTypeEnum',
            'AdExtensionStateSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionStateSelectionEnum',
            'AdExtensionStatusSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionStatusSelectionEnum',
            'Callout' => 'Biplane\YandexDirect\Api\V5\Contract\Callout',
            'AdExtensionBase' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionBase',
            'AdExtension' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtension',
            'AdExtensionSettingItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionSettingItem',
            'AdExtensionSetting' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionSetting',
            'AdCategoryEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdCategoryEnum',
            'AgeLabelEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AgeLabelEnum',
            'MobAppAgeLabelEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobAppAgeLabelEnum',
            'AdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdFieldEnum',
            'AdStateSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdStateSelectionEnum',
            'AdStatusSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdStatusSelectionEnum',
            'TextAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdFieldEnum',
            'TextAdPriceExtensionFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdPriceExtensionFieldEnum',
            'DynamicTextAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdFieldEnum',
            'MobileAppAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdFieldEnum',
            'TextImageAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TextImageAdFieldEnum',
            'MobileAppImageAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppImageAdFieldEnum',
            'TextAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdBuilderAdFieldEnum',
            'MobileAppAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdBuilderAdFieldEnum',
            'MobileAppCpcVideoAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppCpcVideoAdBuilderAdFieldEnum',
            'CpmBannerAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\CpmBannerAdBuilderAdFieldEnum',
            'CpcVideoAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\CpcVideoAdBuilderAdFieldEnum',
            'CpmVideoAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\CpmVideoAdBuilderAdFieldEnum',
            'SmartAdBuilderAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdBuilderAdFieldEnum',
            'ShoppingAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\ShoppingAdFieldEnum',
            'ListingAdFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\ListingAdFieldEnum',
            'AdTypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdTypeEnum',
            'AdSubtypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdSubtypeEnum',
            'MobileAppFeatureEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppFeatureEnum',
            'PriceCurrencyEnum' => 'Biplane\YandexDirect\Api\V5\Contract\PriceCurrencyEnum',
            'PriceQualifierEnum' => 'Biplane\YandexDirect\Api\V5\Contract\PriceQualifierEnum',
            'FeedProcessingStatusEnum' => 'Biplane\YandexDirect\Api\V5\Contract\FeedProcessingStatusEnum',
            'AdExtensionAdGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdExtensionAdGetItem',
            'VideoExtensionGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\VideoExtensionGetItem',
            'TrackingPixelGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\TrackingPixelGetItem',
            'TrackingPixelGetArray' => 'Biplane\YandexDirect\Api\V5\Contract\TrackingPixelGetArray',
            'VideoExtensionAddItem' => 'Biplane\YandexDirect\Api\V5\Contract\VideoExtensionAddItem',
            'VideoExtensionUpdateItem' => 'Biplane\YandexDirect\Api\V5\Contract\VideoExtensionUpdateItem',
            'PriceExtensionAddItem' => 'Biplane\YandexDirect\Api\V5\Contract\PriceExtensionAddItem',
            'PriceExtensionUpdateItem' => 'Biplane\YandexDirect\Api\V5\Contract\PriceExtensionUpdateItem',
            'PriceExtensionGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\PriceExtensionGetItem',
            'MobileAppAdFeatureItem' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdFeatureItem',
            'MobileAppAdFeatureGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdFeatureGetItem',
            'SmartAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdBuilderAdAdd',
            'ShoppingAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\ShoppingAdAdd',
            'ListingAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\ListingAdAdd',
            'FeedFilterConditionItem' => 'Biplane\YandexDirect\Api\V5\Contract\FeedFilterConditionItem',
            'MobileAppAdBase' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdBase',
            'SmartAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdBuilderAdUpdate',
            'ShoppingAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\ShoppingAdUpdate',
            'ListingAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\ListingAdUpdate',
            'AdAddItemBase' => 'Biplane\YandexDirect\Api\V5\Contract\AdAddItemBase',
            'TextAdAddBase' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdAddBase',
            'AdAddItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdAddItem',
            'TextAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdAdd',
            'DynamicTextAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdAdd',
            'MobileAppAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdAdd',
            'ImageAdAddBase' => 'Biplane\YandexDirect\Api\V5\Contract\ImageAdAddBase',
            'TextImageAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\TextImageAdAdd',
            'MobileAppImageAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppImageAdAdd',
            'AdBuilderAdAddItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdBuilderAdAddItem',
            'AdBuilderAdAddBase' => 'Biplane\YandexDirect\Api\V5\Contract\AdBuilderAdAddBase',
            'TextAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdBuilderAdAdd',
            'MobileAppAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdBuilderAdAdd',
            'MobileAppCpcVideoAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppCpcVideoAdBuilderAdAdd',
            'CpmBannerAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\CpmBannerAdBuilderAdAdd',
            'CpcVideoAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\CpcVideoAdBuilderAdAdd',
            'CpmVideoAdBuilderAdAdd' => 'Biplane\YandexDirect\Api\V5\Contract\CpmVideoAdBuilderAdAdd',
            'AdUpdateItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdUpdateItem',
            'TextAdUpdateBase' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdUpdateBase',
            'TextAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdUpdate',
            'DynamicTextAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdUpdate',
            'MobileAppAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdUpdate',
            'ImageAdUpdateBase' => 'Biplane\YandexDirect\Api\V5\Contract\ImageAdUpdateBase',
            'TextImageAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\TextImageAdUpdate',
            'MobileAppImageAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppImageAdUpdate',
            'AdBuilderAdUpdateItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdBuilderAdUpdateItem',
            'AdBuilderAdUpdateBase' => 'Biplane\YandexDirect\Api\V5\Contract\AdBuilderAdUpdateBase',
            'TextAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdBuilderAdUpdate',
            'MobileAppAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdBuilderAdUpdate',
            'CpmBannerAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\CpmBannerAdBuilderAdUpdate',
            'MobileAppCpcVideoAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppCpcVideoAdBuilderAdUpdate',
            'CpcVideoAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\CpcVideoAdBuilderAdUpdate',
            'CpmVideoAdBuilderAdUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\CpmVideoAdBuilderAdUpdate',
            'AdsSelectionCriteria' => 'Biplane\YandexDirect\Api\V5\Contract\AdsSelectionCriteria',
            'TextAdGetBase' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdGetBase',
            'TextAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdGet',
            'SmartAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdBuilderAdGet',
            'DynamicTextAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdGet',
            'MobileAppAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdGet',
            'ImageAdGetBase' => 'Biplane\YandexDirect\Api\V5\Contract\ImageAdGetBase',
            'TextImageAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\TextImageAdGet',
            'MobileAppImageAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppImageAdGet',
            'AdBuilderAdGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdBuilderAdGetItem',
            'AdBuilderAdGetBase' => 'Biplane\YandexDirect\Api\V5\Contract\AdBuilderAdGetBase',
            'TextAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdBuilderAdGet',
            'MobileAppAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdBuilderAdGet',
            'CpcVideoAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\CpcVideoAdBuilderAdGet',
            'MobileAppCpcVideoAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppCpcVideoAdBuilderAdGet',
            'CpmBannerAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\CpmBannerAdBuilderAdGet',
            'CpmVideoAdBuilderAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\CpmVideoAdBuilderAdGet',
            'ShoppingAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\ShoppingAdGet',
            'ListingAdGet' => 'Biplane\YandexDirect\Api\V5\Contract\ListingAdGet',
            'AdGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdGetItem',
            'GetRequest' => 'Biplane\YandexDirect\Api\V5\Contract\GetAdsRequest',
            'GetResponse' => 'Biplane\YandexDirect\Api\V5\Contract\GetAdsResponse',
            'AddRequest' => 'Biplane\YandexDirect\Api\V5\Contract\AddAdsRequest',
            'AddResponse' => 'Biplane\YandexDirect\Api\V5\Contract\AddAdsResponse',
            'UpdateRequest' => 'Biplane\YandexDirect\Api\V5\Contract\UpdateAdsRequest',
            'UpdateResponse' => 'Biplane\YandexDirect\Api\V5\Contract\UpdateAdsResponse',
            'DeleteRequest' => 'Biplane\YandexDirect\Api\V5\Contract\DeleteAdsRequest',
            'DeleteResponse' => 'Biplane\YandexDirect\Api\V5\Contract\DeleteAdsResponse',
            'ArchiveRequest' => 'Biplane\YandexDirect\Api\V5\Contract\ArchiveAdsRequest',
            'ArchiveResponse' => 'Biplane\YandexDirect\Api\V5\Contract\ArchiveAdsResponse',
            'UnarchiveRequest' => 'Biplane\YandexDirect\Api\V5\Contract\UnarchiveAdsRequest',
            'UnarchiveResponse' => 'Biplane\YandexDirect\Api\V5\Contract\UnarchiveAdsResponse',
            'SuspendRequest' => 'Biplane\YandexDirect\Api\V5\Contract\SuspendAdsRequest',
            'SuspendResponse' => 'Biplane\YandexDirect\Api\V5\Contract\SuspendAdsResponse',
            'ResumeRequest' => 'Biplane\YandexDirect\Api\V5\Contract\ResumeAdsRequest',
            'ResumeResponse' => 'Biplane\YandexDirect\Api\V5\Contract\ResumeAdsResponse',
            'ModerateRequest' => 'Biplane\YandexDirect\Api\V5\Contract\ModerateAdsRequest',
            'ModerateResponse' => 'Biplane\YandexDirect\Api\V5\Contract\ModerateAdsResponse',
        ];

        parent::__construct(self::ENDPOINT, $config, $options);
    }

    public function add(AddAdsRequest $parameters): AddAdsResponse
    {
        return $this->__soapCall('add', [$parameters]);
    }

    public function update(UpdateAdsRequest $parameters): UpdateAdsResponse
    {
        return $this->__soapCall('update', [$parameters]);
    }

    public function get(GetAdsRequest $parameters): GetAdsResponse
    {
        return $this->__soapCall('get', [$parameters]);
    }

    public function delete(DeleteAdsRequest $parameters): DeleteAdsResponse
    {
        return $this->__soapCall('delete', [$parameters]);
    }

    public function archive(ArchiveAdsRequest $parameters): ArchiveAdsResponse
    {
        return $this->__soapCall('archive', [$parameters]);
    }

    public function unarchive(UnarchiveAdsRequest $parameters): UnarchiveAdsResponse
    {
        return $this->__soapCall('unarchive', [$parameters]);
    }

    public function suspend(SuspendAdsRequest $parameters): SuspendAdsResponse
    {
        return $this->__soapCall('suspend', [$parameters]);
    }

    public function resume(ResumeAdsRequest $parameters): ResumeAdsResponse
    {
        return $this->__soapCall('resume', [$parameters]);
    }

    public function moderate(ModerateAdsRequest $parameters): ModerateAdsResponse
    {
        return $this->__soapCall('moderate', [$parameters]);
    }
}
