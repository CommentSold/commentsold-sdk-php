<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Fulfillment;

use CommentSold\Api\Resources\Request\AbstractRequest;

class ShippingInfo extends AbstractRequest
{
    public function __construct(
        public string $carrier,
        public string $tracking_number,
        public int $amount_charged_to_shop,
        public int $label_fee,
    ) {
    }
}
