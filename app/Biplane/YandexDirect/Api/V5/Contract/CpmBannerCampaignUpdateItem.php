<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class CpmBannerCampaignUpdateItem extends CpmBannerCampaignBase
{
//    Can be omitted.
//    protected $BiddingStrategy = null;

//    Can be omitted.
//    protected $Settings = null;

//    Can be omitted.
//    protected $VideoTarget = null;

    public function getBiddingStrategy(): ?CpmBannerCampaignStrategy
    {
        return $this->BiddingStrategy ?? null;
    }

    /**
     * @return $this
     */
    public function setBiddingStrategy(?CpmBannerCampaignStrategy $value = null)
    {
        $this->BiddingStrategy = $value;

        return $this;
    }

    /**
     * @return CpmBannerCampaignSetting[]|null
     */
    public function getSettings(): ?array
    {
        return $this->Settings ?? null;
    }

    /**
     * @param CpmBannerCampaignSetting[]|null $value
     *
     * @return $this
     */
    public function setSettings(?array $value = null)
    {
        $this->Settings = $value;

        return $this;
    }

    /**
     * @see VideoTargetEnum
     */
    public function getVideoTarget(): ?string
    {
        return $this->VideoTarget ?? null;
    }

    /**
     * @see VideoTargetEnum
     *
     * @return $this
     */
    public function setVideoTarget(?string $value = null)
    {
        $this->VideoTarget = $value;

        return $this;
    }
}
