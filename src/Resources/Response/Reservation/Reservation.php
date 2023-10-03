<?php

declare(strict_types=1);

namespace Resources\Response\Reservation;

use Resources\AbstractResource;

class Reservation extends AbstractResource
{
    public readonly int $id;
    public readonly int $customer_id;
    public readonly ?string $external_customer_id;
    public readonly int $variant_id;
    public readonly int $created_at;
    public readonly int $updated_at;

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
