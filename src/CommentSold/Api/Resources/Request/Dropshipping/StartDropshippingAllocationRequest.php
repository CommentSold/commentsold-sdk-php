<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Dropshipping;

use CommentSold\Api\Resources\Request\AbstractRequest;

class StartDropshippingAllocationRequest extends AbstractRequest
{
    /** @var array[int] */
    public function __construct(public array $product_ids)
    {
    }
}
