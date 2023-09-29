<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Fulfillment;

use CommentSold\Api\Resources\Request\AbstractRequest;

class ShippingInfo extends AbstractRequest
{
    public string $carrier;
    public string $tracking_number;
    public int $amount_charged_to_shop;
    public int $label_fee;

    public function __construct(array $payload)
    {
        $this->carrier                = $payload['carrier'];
        $this->tracking_number        = $payload['tracking_number'];
        $this->amount_charged_to_shop = $payload['amount_charged_to_shop'];
        $this->label_fee              = $payload['label_fee'];
    }
}
