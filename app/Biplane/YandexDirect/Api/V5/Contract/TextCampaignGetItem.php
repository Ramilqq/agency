<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class TextCampaignGetItem extends TextCampaignBase
{
//    Can be omitted.
//    protected $BiddingStrategy = null;

//    Can be omitted.
//    protected $Settings = null;

//    Can be omitted.
//    protected $TrackingParams = null;

//    Can be omitted.
//    protected $PriorityGoals = null;

//    Can be omitted.
//    protected $PackageBiddingStrategy = null;

//    Can be omitted.
//    protected $CanBeUsedAsPackageBiddingStrategySource = null;

    public function getBiddingStrategy(): ?TextCampaignStrategy
    {
        return $this->BiddingStrategy ?? null;
    }

    /**
     * @return $this
     */
    public function setBiddingStrategy(?TextCampaignStrategy $value = null)
    {
        $this->BiddingStrategy = $value;

        return $this;
    }

    /**
     * @return TextCampaignSettingGet[]|null
     */
    public function getSettings(): ?array
    {
        return $this->Settings ?? null;
    }

    /**
     * @param TextCampaignSettingGet[]|null $value
     *
     * @return $this
     */
    public function setSettings(?array $value = null)
    {
        $this->Settings = $value;

        return $this;
    }

    public function getTrackingParams(): ?string
    {
        return $this->TrackingParams ?? null;
    }

    /**
     * @return $this
     */
    public function setTrackingParams(?string $value = null)
    {
        $this->TrackingParams = $value;

        return $this;
    }

    public function getPriorityGoals(): ?PriorityGoalsArray
    {
        return $this->PriorityGoals ?? null;
    }

    /**
     * @return $this
     */
    public function setPriorityGoals(?PriorityGoalsArray $value = null)
    {
        $this->PriorityGoals = $value;

        return $this;
    }

    public function getPackageBiddingStrategy(): ?TextCampaignPackageBiddingStrategyGet
    {
        return $this->PackageBiddingStrategy ?? null;
    }

    /**
     * @return $this
     */
    public function setPackageBiddingStrategy(?TextCampaignPackageBiddingStrategyGet $value = null)
    {
        $this->PackageBiddingStrategy = $value;

        return $this;
    }

    /**
     * @see YesNoEnum
     */
    public function getCanBeUsedAsPackageBiddingStrategySource(): ?string
    {
        return $this->CanBeUsedAsPackageBiddingStrategySource ?? null;
    }

    /**
     * @see YesNoEnum
     *
     * @return $this
     */
    public function setCanBeUsedAsPackageBiddingStrategySource(?string $value = null)
    {
        $this->CanBeUsedAsPackageBiddingStrategySource = $value;

        return $this;
    }
}
