<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class DeleteProductVariantRequest extends AbstractRequest
{
    public int $product_id;
    public int $variant_id;

    public function __construct(array $payload)
    {
        $this->product_id = $payload['product_id'];
        $this->variant_id = $payload['variant_id'];
    }
}
