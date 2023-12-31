<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Fulfillment;

use CommentSold\Resources\Request\AbstractRequest;

class AddTrackingRequest extends AbstractRequest
{
    /**
     * @param  int[]  $line_item_ids
     */
    public function __construct(
        public array $line_item_ids,
        public ShippingInfo $shipping_info,
    ) {
    }
}
