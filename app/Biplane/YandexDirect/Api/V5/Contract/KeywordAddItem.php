<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class KeywordAddItem
{
    protected $Keyword = null;

    protected $AdGroupId = null;

//    Can be omitted.
//    protected $Bid = null;

//    Can be omitted.
//    protected $AutotargetingSearchBidIsAuto = null;

//    Can be omitted.
//    protected $ContextBid = null;

//    Can be omitted.
//    protected $StrategyPriority = null;

//    Can be omitted.
//    protected $UserParam1 = null;

//    Can be omitted.
//    protected $UserParam2 = null;

//    Can be omitted.
//    protected $AutotargetingCategories = null;

//    Can be omitted.
//    protected $AutotargetingBrandOptions = null;

//    Can be omitted.
//    protected $AutotargetingSettings = null;

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    public function getKeyword(): string
    {
        return $this->Keyword;
    }

    /**
     * @return $this
     */
    public function setKeyword(string $value)
    {
        $this->Keyword = $value;

        return $this;
    }

    public function getAdGroupId(): int
    {
        return $this->AdGroupId;
    }

    /**
     * @return $this
     */
    public function setAdGroupId(int $value)
    {
        $this->AdGroupId = $value;

        return $this;
    }

    public function getBid(): ?int
    {
        return $this->Bid ?? null;
    }

    /**
     * @return $this
     */
    public function setBid(?int $value = null)
    {
        $this->Bid = $value;

        return $this;
    }

    /**
     * @see YesNoEnum
     */
    public function getAutotargetingSearchBidIsAuto(): ?string
    {
        return $this->AutotargetingSearchBidIsAuto ?? null;
    }

    /**
     * @see YesNoEnum
     *
     * @return $this
     */
    public function setAutotargetingSearchBidIsAuto(?string $value = null)
    {
        $this->AutotargetingSearchBidIsAuto = $value;

        return $this;
    }

    public function getContextBid(): ?int
    {
        return $this->ContextBid ?? null;
    }

    /**
     * @return $this
     */
    public function setContextBid(?int $value = null)
    {
        $this->ContextBid = $value;

        return $this;
    }

    /**
     * @see PriorityEnum
     */
    public function getStrategyPriority(): ?string
    {
        return $this->StrategyPriority ?? null;
    }

    /**
     * @see PriorityEnum
     *
     * @return $this
     */
    public function setStrategyPriority(?string $value = null)
    {
        $this->StrategyPriority = $value;

        return $this;
    }

    public function getUserParam1(): ?string
    {
        return $this->UserParam1 ?? null;
    }

    /**
     * @return $this
     */
    public function setUserParam1(?string $value = null)
    {
        $this->UserParam1 = $value;

        return $this;
    }

    public function getUserParam2(): ?string
    {
        return $this->UserParam2 ?? null;
    }

    /**
     * @return $this
     */
    public function setUserParam2(?string $value = null)
    {
        $this->UserParam2 = $value;

        return $this;
    }

    /**
     * @return AutotargetingCategory[]|null
     */
    public function getAutotargetingCategories(): ?array
    {
        return $this->AutotargetingCategories ?? null;
    }

    /**
     * @param AutotargetingCategory[]|null $value
     *
     * @return $this
     */
    public function setAutotargetingCategories(?array $value = null)
    {
        $this->AutotargetingCategories = $value;

        return $this;
    }

    /**
     * @return AutotargetingBrandOption[]|null
     */
    public function getAutotargetingBrandOptions(): ?array
    {
        return $this->AutotargetingBrandOptions ?? null;
    }

    /**
     * @param AutotargetingBrandOption[]|null $value
     *
     * @return $this
     */
    public function setAutotargetingBrandOptions(?array $value = null)
    {
        $this->AutotargetingBrandOptions = $value;

        return $this;
    }

    public function getAutotargetingSettings(): ?AutotargetingSettings
    {
        return $this->AutotargetingSettings ?? null;
    }

    /**
     * @return $this
     */
    public function setAutotargetingSettings(?AutotargetingSettings $value = null)
    {
        $this->AutotargetingSettings = $value;

        return $this;
    }
}
