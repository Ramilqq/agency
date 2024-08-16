<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5;

use Biplane\YandexDirect\Api\ApiSoapClientV5;
use Biplane\YandexDirect\Api\V5\Contract\AddAdGroupsRequest;
use Biplane\YandexDirect\Api\V5\Contract\AddAdGroupsResponse;
use Biplane\YandexDirect\Api\V5\Contract\DeleteAdGroupsRequest;
use Biplane\YandexDirect\Api\V5\Contract\DeleteAdGroupsResponse;
use Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsRequest;
use Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsResponse;
use Biplane\YandexDirect\Api\V5\Contract\UpdateAdGroupsRequest;
use Biplane\YandexDirect\Api\V5\Contract\UpdateAdGroupsResponse;
use Biplane\YandexDirect\Config;

/**
 * Auto-generated code.
 */
class AdGroups extends ApiSoapClientV5
{
    public const ENDPOINT = 'https://api.direct.yandex.com/v501/adgroups?wsdl';

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
            'AdGroupFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupFieldEnum',
            'MobileAppAdGroupFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdGroupFieldEnum',
            'DynamicTextAdGroupFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdGroupFieldEnum',
            'DynamicTextFeedAdGroupFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextFeedAdGroupFieldEnum',
            'SmartAdGroupFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdGroupFieldEnum',
            'TextAdGroupFeedParamsFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdGroupFeedParamsFieldEnum',
            'UnifiedAdGroupFieldEnum' => 'Biplane\YandexDirect\Api\V5\Contract\UnifiedAdGroupFieldEnum',
            'AdGroupSubtypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupSubtypeEnum',
            'AdGroupStatusSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupStatusSelectionEnum',
            'AdGroupAppIconStatusSelectionEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupAppIconStatusSelectionEnum',
            'SourceProcessingStatusEnum' => 'Biplane\YandexDirect\Api\V5\Contract\SourceProcessingStatusEnum',
            'SourceTypeGetEnum' => 'Biplane\YandexDirect\Api\V5\Contract\SourceTypeGetEnum',
            'AdGroupsSelectionCriteria' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupsSelectionCriteria',
            'AdGroupBase' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupBase',
            'AdGroupAddItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupAddItem',
            'AdGroupGetItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupGetItem',
            'TargetDeviceTypeEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TargetDeviceTypeEnum',
            'TargetCarrierEnum' => 'Biplane\YandexDirect\Api\V5\Contract\TargetCarrierEnum',
            'AppAvailabilityStatusEnum' => 'Biplane\YandexDirect\Api\V5\Contract\AppAvailabilityStatusEnum',
            'MobileAppAdGroupGet' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdGroupGet',
            'MobileAppAdGroupUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdGroupUpdate',
            'MobileAppAdGroupAdd' => 'Biplane\YandexDirect\Api\V5\Contract\MobileAppAdGroupAdd',
            'DynamicAdGroup' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicAdGroup',
            'DynamicAdGroupGet' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicAdGroupGet',
            'DynamicTextAdGroup' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdGroup',
            'DynamicTextAdGroupGet' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextAdGroupGet',
            'DynamicTextFeedAdGroup' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextFeedAdGroup',
            'DynamicTextFeedAdGroupUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextFeedAdGroupUpdate',
            'DynamicSourceGet' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicSourceGet',
            'DynamicTextFeedAdGroupGet' => 'Biplane\YandexDirect\Api\V5\Contract\DynamicTextFeedAdGroupGet',
            'TextAdGroupFeedParamsAdd' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdGroupFeedParamsAdd',
            'TextAdGroupFeedParamsUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdGroupFeedParamsUpdate',
            'TextAdGroupFeedParamsGet' => 'Biplane\YandexDirect\Api\V5\Contract\TextAdGroupFeedParamsGet',
            'UnifiedAdGroupGet' => 'Biplane\YandexDirect\Api\V5\Contract\UnifiedAdGroupGet',
            'CpmBannerKeywordsAdGroupAdd' => 'Biplane\YandexDirect\Api\V5\Contract\CpmBannerKeywordsAdGroupAdd',
            'CpmBannerUserProfileAdGroupAdd' => 'Biplane\YandexDirect\Api\V5\Contract\CpmBannerUserProfileAdGroupAdd',
            'CpmVideoAdGroupAdd' => 'Biplane\YandexDirect\Api\V5\Contract\CpmVideoAdGroupAdd',
            'UnifiedAdGroupAdd' => 'Biplane\YandexDirect\Api\V5\Contract\UnifiedAdGroupAdd',
            'UnifiedAdGroupUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\UnifiedAdGroupUpdate',
            'SmartAdGroupAdd' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdGroupAdd',
            'SmartAdGroupGet' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdGroupGet',
            'SmartAdGroupUpdate' => 'Biplane\YandexDirect\Api\V5\Contract\SmartAdGroupUpdate',
            'AdGroupUpdateItem' => 'Biplane\YandexDirect\Api\V5\Contract\AdGroupUpdateItem',
            'GetRequest' => 'Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsRequest',
            'GetResponse' => 'Biplane\YandexDirect\Api\V5\Contract\GetAdGroupsResponse',
            'AddRequest' => 'Biplane\YandexDirect\Api\V5\Contract\AddAdGroupsRequest',
            'AddResponse' => 'Biplane\YandexDirect\Api\V5\Contract\AddAdGroupsResponse',
            'UpdateRequest' => 'Biplane\YandexDirect\Api\V5\Contract\UpdateAdGroupsRequest',
            'UpdateResponse' => 'Biplane\YandexDirect\Api\V5\Contract\UpdateAdGroupsResponse',
            'DeleteRequest' => 'Biplane\YandexDirect\Api\V5\Contract\DeleteAdGroupsRequest',
            'DeleteResponse' => 'Biplane\YandexDirect\Api\V5\Contract\DeleteAdGroupsResponse',
        ];

        parent::__construct(self::ENDPOINT, $config, $options);
    }

    public function get(GetAdGroupsRequest $parameters): GetAdGroupsResponse
    {
        return $this->__soapCall('get', [$parameters]);
    }

    public function add(AddAdGroupsRequest $parameters): AddAdGroupsResponse
    {
        return $this->__soapCall('add', [$parameters]);
    }

    public function update(UpdateAdGroupsRequest $parameters): UpdateAdGroupsResponse
    {
        return $this->__soapCall('update', [$parameters]);
    }

    public function delete(DeleteAdGroupsRequest $parameters): DeleteAdGroupsResponse
    {
        return $this->__soapCall('delete', [$parameters]);
    }
}
