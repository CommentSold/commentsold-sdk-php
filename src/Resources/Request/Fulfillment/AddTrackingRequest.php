<?php

declare(strict_types=1);

namespace Resources\Request\Fulfillment;

use Resources\Request\AbstractRequest;

class AddTrackingRequest extends AbstractRequest
{
    /** @var array[int] */
    public function __construct(
        public array $line_item_ids,
        public ShippingInfo $shipping_info,
    ) {
    }
}
