<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Dropshipping;

use CommentSold\Api\Resources\Request\AbstractRequest;

class RestockDropshippingAllocationRequest extends AbstractRequest
{
    /** @var array[int] */
    public array $product_ids;

    public function __construct(array $payload)
    {
        $this->product_ids = $payload['product_ids'];
    }
}
