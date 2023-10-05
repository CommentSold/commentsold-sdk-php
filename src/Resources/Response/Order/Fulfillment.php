<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Order;

use CommentSold\Resources\AbstractResource;

class Fulfillment extends AbstractResource
{
    public readonly bool $local_pickup;
    public readonly FulfillmentV1 $v1;
    public readonly FulfillmentShippingLabelCollection $shipping_labels;

    public function __construct(object $payload)
    {
        $this->local_pickup    = $payload->local_pickup;
        $this->v1              = new FulfillmentV1($payload->v1);
        $this->shipping_labels = new FulfillmentShippingLabelCollection($payload->shipping_labels);
    }
}
