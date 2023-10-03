<?php

declare(strict_types=1);

namespace Resources\Request\InventoryLevel;

use Resources\Request\AbstractRequest;

class GetVariantInventoryLevelsRequest extends AbstractRequest
{
    public function __construct(public int $variant_id)
    {
    }
}
