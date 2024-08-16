<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class DeduplicateErrorItem extends ActionResult
{
    protected $Position = null;

    public function getPosition(): int
    {
        return $this->Position;
    }

    /**
     * @return $this
     */
    public function setPosition(int $value)
    {
        $this->Position = $value;

        return $this;
    }
}
