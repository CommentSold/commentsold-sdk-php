<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\InventoryLevel;

use CommentSold\Api\Resources\Response\AbstractResponse;

class InventoryLevel extends AbstractResponse
{
    public int $variant_id;
    public int $product_id;
    public int $total_available_quantity;
    public int $created_at;
    public int $updated_at;

    public function __construct(object $payload)
    {
        $this->variant_id               = $payload->variant_id;
        $this->product_id               = $payload->product_id;
        $this->total_available_quantity = $payload->total_available_quantity;
        $this->created_at               = $payload->created_at;
        $this->updated_at               = $payload->updated_at;
    }
}
