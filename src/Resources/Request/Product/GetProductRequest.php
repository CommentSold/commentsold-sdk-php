<?php

declare(strict_types=1);

namespace Resources\Request\Product;

use Resources\Request\AbstractRequest;

class GetProductRequest extends AbstractRequest
{
    public function __construct(public int $product_id)
    {
    }
}
