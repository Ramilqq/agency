<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class StrategyPayForConversionPerFilterBase
{
//    Can be omitted.
//    protected $Cpa = null;

//    Can be omitted.
//    protected $GoalId = null;

//    Can be omitted.
//    protected $WeeklySpendLimit = null;

//    Can be omitted.
//    protected $CustomPeriodBudget = null;

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    public function getCpa(): ?int
    {
        return $this->Cpa ?? null;
    }

    /**
     * @return $this
     */
    public function setCpa(?int $value = null)
    {
        $this->Cpa = $value;

        return $this;
    }

    public function getGoalId(): ?int
    {
        return $this->GoalId ?? null;
    }

    /**
     * @return $this
     */
    public function setGoalId(?int $value = null)
    {
        $this->GoalId = $value;

        return $this;
    }

    public function getWeeklySpendLimit(): ?int
    {
        return $this->WeeklySpendLimit ?? null;
    }

    /**
     * @return $this
     */
    public function setWeeklySpendLimit(?int $value = null)
    {
        $this->WeeklySpendLimit = $value;

        return $this;
    }

    public function getCustomPeriodBudget(): ?CustomPeriodBudget
    {
        return $this->CustomPeriodBudget ?? null;
    }

    /**
     * @return $this
     */
    public function setCustomPeriodBudget(?CustomPeriodBudget $value = null)
    {
        $this->CustomPeriodBudget = $value;

        return $this;
    }
}
