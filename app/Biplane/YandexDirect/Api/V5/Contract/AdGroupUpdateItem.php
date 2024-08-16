<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class AdGroupUpdateItem extends AdGroupBase
{
    protected $Id = null;

//    Can be omitted.
//    protected $Name = null;

//    Can be omitted.
//    protected $MobileAppAdGroup = null;

//    Can be omitted.
//    protected $DynamicTextAdGroup = null;

//    Can be omitted.
//    protected $DynamicTextFeedAdGroup = null;

//    Can be omitted.
//    protected $SmartAdGroup = null;

//    Can be omitted.
//    protected $TextAdGroupFeedParams = null;

//    Can be omitted.
//    protected $UnifiedAdGroup = null;

    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * @return $this
     */
    public function setId(int $value)
    {
        $this->Id = $value;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name ?? null;
    }

    /**
     * @return $this
     */
    public function setName(?string $value = null)
    {
        $this->Name = $value;

        return $this;
    }

    public function getMobileAppAdGroup(): ?MobileAppAdGroupUpdate
    {
        return $this->MobileAppAdGroup ?? null;
    }

    /**
     * @return $this
     */
    public function setMobileAppAdGroup(?MobileAppAdGroupUpdate $value = null)
    {
        $this->MobileAppAdGroup = $value;

        return $this;
    }

    public function getDynamicTextAdGroup(): ?DynamicTextAdGroup
    {
        return $this->DynamicTextAdGroup ?? null;
    }

    /**
     * @return $this
     */
    public function setDynamicTextAdGroup(?DynamicTextAdGroup $value = null)
    {
        $this->DynamicTextAdGroup = $value;

        return $this;
    }

    public function getDynamicTextFeedAdGroup(): ?DynamicTextFeedAdGroupUpdate
    {
        return $this->DynamicTextFeedAdGroup ?? null;
    }

    /**
     * @return $this
     */
    public function setDynamicTextFeedAdGroup(?DynamicTextFeedAdGroupUpdate $value = null)
    {
        $this->DynamicTextFeedAdGroup = $value;

        return $this;
    }

    public function getSmartAdGroup(): ?SmartAdGroupUpdate
    {
        return $this->SmartAdGroup ?? null;
    }

    /**
     * @return $this
     */
    public function setSmartAdGroup(?SmartAdGroupUpdate $value = null)
    {
        $this->SmartAdGroup = $value;

        return $this;
    }

    public function getTextAdGroupFeedParams(): ?TextAdGroupFeedParamsUpdate
    {
        return $this->TextAdGroupFeedParams ?? null;
    }

    /**
     * @return $this
     */
    public function setTextAdGroupFeedParams(?TextAdGroupFeedParamsUpdate $value = null)
    {
        $this->TextAdGroupFeedParams = $value;

        return $this;
    }

    public function getUnifiedAdGroup(): ?UnifiedAdGroupUpdate
    {
        return $this->UnifiedAdGroup ?? null;
    }

    /**
     * @return $this
     */
    public function setUnifiedAdGroup(?UnifiedAdGroupUpdate $value = null)
    {
        $this->UnifiedAdGroup = $value;

        return $this;
    }
}
