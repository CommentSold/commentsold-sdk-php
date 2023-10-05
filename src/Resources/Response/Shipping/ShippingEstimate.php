<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Shipping;

use CommentSold\Resources\AbstractResource;

class ShippingEstimate extends AbstractResource
{
    public readonly int $shipping_fee;

    public function __construct(object $payload)
    {
        $this->shipping_fee = $payload->shipping_fee;
    }
}
