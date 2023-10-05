<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Order;

use CommentSold\Resources\AbstractResource;

class FulfillmentShippingLabelCollection extends AbstractResource
{
    /** @var array[FulfillmentShippingLabel] */
    public array $shipping_labels;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new FulfillmentShippingLabel($item);
        }

        $this->shipping_labels = $array;
    }
}
