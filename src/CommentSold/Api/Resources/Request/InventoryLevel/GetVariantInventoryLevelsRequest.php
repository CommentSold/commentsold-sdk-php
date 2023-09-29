<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\InventoryLevel;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetVariantInventoryLevelsRequest extends AbstractRequest
{
    public int $variant_id;

    public function __construct(int $variant_id)
    {
        $this->variant_id = $variant_id;
    }
}
