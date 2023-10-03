<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\InventoryLevel;

use CommentSold\Resources\Request\AbstractRequest;

class GetVariantInventoryLevelsRequest extends AbstractRequest
{
    public function __construct(public int $variant_id)
    {
    }
}
