<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class IdsCriteria
{
    protected $Ids = [];

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @return int[]
     */
    public function getIds(): array
    {
        return $this->Ids;
    }

    /**
     * @param int[] $value
     *
     * @return $this
     */
    public function setIds(array $value)
    {
        $this->Ids = $value;

        return $this;
    }
}
