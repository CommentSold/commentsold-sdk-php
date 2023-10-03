<?php

declare(strict_types=1);

namespace Resources\Request\Shipping;

use Resources\Request\AbstractRequest;

class EstimateShippingRequest extends AbstractRequest
{
    /** @var array[int] */
    public function __construct(
        public array $variant_ids,
        public ?string $shipping_method = null,
    ) {
    }
}
