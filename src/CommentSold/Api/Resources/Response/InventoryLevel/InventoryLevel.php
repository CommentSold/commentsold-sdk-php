<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\InventoryLevel;

use CommentSold\Api\Resources\AbstractResource;

class InventoryLevel extends AbstractResource
{
    public readonly int $variant_id;
    public readonly int $product_id;
    public readonly int $total_available_quantity;
    public readonly int $created_at;
    public readonly int $updated_at;

    public function __construct(object $payload)
    {
        $this->variant_id               = $payload->variant_id;
        $this->product_id               = $payload->product_id;
        $this->total_available_quantity = $payload->total_available_quantity;
        $this->created_at               = $payload->created_at;
        $this->updated_at               = $payload->updated_at;
    }
}
