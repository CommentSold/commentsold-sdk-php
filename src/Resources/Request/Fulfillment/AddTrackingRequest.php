<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Fulfillment;

use CommentSold\Resources\Request\AbstractRequest;

class AddTrackingRequest extends AbstractRequest
{
    public function __construct(
        /** @var int[] */
        public array $line_item_ids,
        public ShippingInfo $shipping_info,
    ) {
    }
}
