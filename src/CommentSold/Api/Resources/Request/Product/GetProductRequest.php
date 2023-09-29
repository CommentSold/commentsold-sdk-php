<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetProductRequest extends AbstractRequest
{
    public int $product_id;

    public function __construct(int $product_id)
    {
        $this->product_id = $product_id;
    }
}
