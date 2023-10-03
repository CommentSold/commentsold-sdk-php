<?php

declare(strict_types=1);

namespace Resources\Request\Product;

use Resources\Request\AbstractRequest;

class DeleteProductRequest extends AbstractRequest
{
    public function __construct(public int $product_id)
    {
    }
}
