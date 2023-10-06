<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Shipping;

use CommentSold\Resources\Request\AbstractRequest;

class EstimateShippingRequest extends AbstractRequest
{
    public function __construct(
        /** @var int[] */
        public array $variant_ids,
        public ?string $shipping_method = null,
    ) {
    }
}
