<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class MobileAppCampaignStrategyAdd
{
    protected $Search = null;

    protected $Network = null;

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    public function getSearch(): MobileAppCampaignSearchStrategyAdd
    {
        return $this->Search;
    }

    /**
     * @return $this
     */
    public function setSearch(MobileAppCampaignSearchStrategyAdd $value)
    {
        $this->Search = $value;

        return $this;
    }

    public function getNetwork(): MobileAppCampaignNetworkStrategyAdd
    {
        return $this->Network;
    }

    /**
     * @return $this
     */
    public function setNetwork(MobileAppCampaignNetworkStrategyAdd $value)
    {
        $this->Network = $value;

        return $this;
    }
}
