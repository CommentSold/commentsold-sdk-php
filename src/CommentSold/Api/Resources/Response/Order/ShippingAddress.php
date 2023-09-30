<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\Response\AbstractResponse;

class ShippingAddress extends AbstractResponse
{
    public ?string $name;
    public ?string $street_address;
    public ?string $apartment;
    public ?string $city;
    public ?string $state;
    public ?string $zip;
    public ?string $country_code;

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
