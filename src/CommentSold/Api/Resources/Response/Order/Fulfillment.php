<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\AbstractResource;

class Fulfillment extends AbstractResource
{
    public readonly bool $local_pickup;
    public readonly FulfillmentV1 $v1;
    /** @var array[FulfillmentShippingLabel] */
    public readonly array $shipping_labels;

    public function __construct(object $payload)
    {
        $shipping_labels = [];
        foreach ($payload->shipping_labels ?? [] as $shipping_label) {
            $shipping_labels[] = new FulfillmentShippingLabel($shipping_label);
        }

        $this->local_pickup    = $payload->local_pickup;
        $this->v1              = new FulfillmentV1($payload->v1);
        $this->shipping_labels = $shipping_labels;
    }
}
