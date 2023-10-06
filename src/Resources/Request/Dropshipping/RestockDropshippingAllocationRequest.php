<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Dropshipping;

use CommentSold\Resources\Request\AbstractRequest;

class RestockDropshippingAllocationRequest extends AbstractRequest
{
    public function __construct(
        /** @var int[] */
        public array $product_ids
    ) {
    }
}
