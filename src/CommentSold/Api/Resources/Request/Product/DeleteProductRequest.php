<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class DeleteProductRequest extends AbstractRequest
{
    public function __construct(public int $product_id)
    {
    }
}
