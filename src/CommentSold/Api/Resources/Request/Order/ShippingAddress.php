<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Order;

use CommentSold\Api\Resources\Request\AbstractRequest;

class ShippingAddress extends AbstractRequest
{
    public string $name;
    public string $street_address;
    public ?string $apartment = null;
    public string $city;
    public string $state;
    public string $zip;
    public string $country_code;
    public ?string $phone_number = null;
    public ?string $email = null;

    public function __construct(array $payload)
    {
        $this->name           = $payload['name'];
        $this->street_address = $payload['street_address'];
        $this->apartment      = $payload['apartment'] ?? null;
        $this->city           = $payload['city'];
        $this->state          = $payload['state'];
        $this->zip            = $payload['zip'];
        $this->country_code   = $payload['country_code'];
        $this->phone_number   = $payload['phone_number'] ?? null;
        $this->email          = $payload['email'] ?? null;
    }
}
