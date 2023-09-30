<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Reservation;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Reservation extends AbstractResponse
{
    public int $id;
    public int $customer_id;
    public ?string $external_customer_id;
    public int $variant_id;
    public int $created_at;
    public int $updated_at;

    public function __construct(object $payload)
    {
        $this->id                   = $payload->id;
        $this->customer_id          = $payload->customer_id;
        $this->external_customer_id = $payload->external_customer_id;
        $this->variant_id           = $payload->variant_id;
        $this->created_at           = $payload->created_at;
        $this->updated_at           = $payload->updated_at;
    }
}
