<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\Response\AbstractResponse;

class LineItem extends AbstractResponse
{
    public int $id;
    public int $product_id;
    public int $variant_id;
    public int $price;
    public int $created_at;
    public bool $is_returned;

    public function __construct(object $payload)
    {
        $this->id          = $payload->id;
        $this->product_id  = $payload->product_id;
        $this->variant_id  = $payload->variant_id;
        $this->price       = $payload->price;
        $this->created_at  = $payload->created_at;
        $this->is_returned = $payload->is_returned;
    }
}
