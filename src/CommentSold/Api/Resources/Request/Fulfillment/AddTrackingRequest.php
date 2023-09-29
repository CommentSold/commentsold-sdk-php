<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Fulfillment;

use CommentSold\Api\Resources\Request\AbstractRequest;

class AddTrackingRequest extends AbstractRequest
{
    /** @var array[int] */
    public array $line_item_ids;
    public ShippingInfo $shipping_info;

    public function __construct(array $payload)
    {
        $this->line_item_ids = $payload['line_item_ids'];
        $this->shipping_info = new ShippingInfo($payload['shipping_info']);
    }
}
