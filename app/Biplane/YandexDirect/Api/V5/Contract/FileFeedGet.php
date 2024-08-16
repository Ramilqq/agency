<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class FileFeedGet
{
//    Can be omitted.
//    protected $Filename = null;

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    public function getFilename(): ?string
    {
        return $this->Filename ?? null;
    }

    /**
     * @return $this
     */
    public function setFilename(?string $value = null)
    {
        $this->Filename = $value;

        return $this;
    }
}
