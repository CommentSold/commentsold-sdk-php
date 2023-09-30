<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\Response\AbstractResponse;

class FulfillmentV1 extends AbstractResponse
{
    public ?string $tracking_number;
    public ?int $shipped_date;
    public ?string $label_url;

    public function __construct(object $payload)
    {
        $this->tracking_number = $payload->tracking_number;
        $this->shipped_date    = $payload->shipped_date;
        $this->label_url       = $payload->label_url;
    }
}
