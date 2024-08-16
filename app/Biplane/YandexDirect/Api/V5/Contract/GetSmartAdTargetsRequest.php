<?php

declare(strict_types=1);

namespace Biplane\YandexDirect\Api\V5\Contract;

use AllowDynamicProperties;

/**
 * Auto-generated code.
 */
#[AllowDynamicProperties]
class GetSmartAdTargetsRequest extends GetRequestGeneral
{
    protected $SelectionCriteria = null;

    protected $FieldNames = [];

    public function getSelectionCriteria(): AdTargetsSelectionCriteria
    {
        return $this->SelectionCriteria;
    }

    /**
     * @return $this
     */
    public function setSelectionCriteria(AdTargetsSelectionCriteria $value)
    {
        $this->SelectionCriteria = $value;

        return $this;
    }

    /**
     * @see SmartAdTargetFieldEnum
     *
     * @return string[]
     */
    public function getFieldNames(): array
    {
        return $this->FieldNames;
    }

    /**
     * @see SmartAdTargetFieldEnum
     *
     * @param string[] $value
     *
     * @return $this
     */
    public function setFieldNames(array $value)
    {
        $this->FieldNames = $value;

        return $this;
    }
}
