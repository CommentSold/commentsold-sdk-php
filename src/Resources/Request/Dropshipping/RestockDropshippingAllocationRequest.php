<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Dropshipping;

use CommentSold\Resources\Request\AbstractRequest;

class RestockDropshippingAllocationRequest extends AbstractRequest
{
    /**
     * @param  int[]  $product_ids
     */
    public function __construct(
        public array $product_ids
    ) {
    }
}
