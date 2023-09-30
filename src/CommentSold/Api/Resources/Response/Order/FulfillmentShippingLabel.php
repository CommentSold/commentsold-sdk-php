<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\Response\AbstractResponse;

class FulfillmentShippingLabel extends AbstractResponse
{
    public string $provider;
    public string $tracking_number;
    public string $tracking_url;
    public string $print_url;
    public int $cost;
    public int $created_at;

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
