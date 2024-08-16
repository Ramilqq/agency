<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Soap\TypeConverter;

use function array_map;
use function is_array;

final class ArrayOfLongTypeTypeConverter extends ArrayOfStringTypeConverter
{
    public function getTypeName(): string
    {
        return 'ArrayOfLong';
    }

    /**
     * {@inheritDoc}
     */
    public function fromXml(string $xml)
    {
        $items = parent::fromXml($xml);

        if (is_array($items)) {
            return array_map('floatval', $items);
        }

        return $items;
    }
}
