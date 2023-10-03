<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Product;

use CommentSold\Resources\Request\AbstractRequest;

class GetProductRequest extends AbstractRequest
{
    public function __construct(public int $product_id)
    {
    }
}
