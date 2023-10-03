<?php

declare(strict_types=1);

namespace Resources\Response\Order;

use Resources\AbstractResource;

class ShippingAddress extends AbstractResource
{
    public readonly ?string $name;
    public readonly ?string $street_address;
    public readonly ?string $apartment;
    public readonly ?string $city;
    public readonly ?string $state;
    public readonly ?string $zip;
    public readonly ?string $country_code;

    public function __construct(object $payload)
    {
        $this->name           = $payload->name;
        $this->street_address = $payload->street_address;
        $this->apartment      = $payload->apartment;
        $this->city           = $payload->city;
        $this->state          = $payload->state;
        $this->zip            = $payload->zip;
        $this->country_code   = $payload->country_code;
    }
}
