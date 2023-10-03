<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Order;

use CommentSold\Resources\AbstractResource;

class FulfillmentShippingLabel extends AbstractResource
{
    public readonly string $provider;
    public readonly string $tracking_number;
    public readonly string $tracking_url;
    public readonly string $print_url;
    public readonly int $cost;
    public readonly int $created_at;

    public function __construct(object $payload)
    {
        $this->provider        = $payload->provider;
        $this->tracking_number = $payload->tracking_number;
        $this->tracking_url    = $payload->tracking_url;
        $this->print_url       = $payload->print_url;
        $this->cost            = $payload->cost;
        $this->created_at      = $payload->created_at;
    }
}
