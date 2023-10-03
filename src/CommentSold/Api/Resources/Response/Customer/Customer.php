<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Customer;

use CommentSold\Api\Resources\AbstractResource;

class Customer extends AbstractResource
{
    public readonly int $id;
    public readonly ?string $name;
    public readonly ?string $email;
    public readonly ?string $street_address;
    public readonly ?string $city;
    public readonly ?string $state;
    public readonly ?string $zip;
    public readonly ?string $country_code;
    public readonly ?string $phone_number;
    public readonly ?string $external_id;
    public readonly int $created_at;
    public readonly int $updated_at;

    public function __construct(object $payload)
    {
        $this->id             = $payload->id;
        $this->name           = $payload->name;
        $this->email          = $payload->email;
        $this->street_address = $payload->street_address;
        $this->city           = $payload->city;
        $this->state          = $payload->state;
        $this->zip            = $payload->zip;
        $this->country_code   = $payload->country_code;
        $this->phone_number   = $payload->phone_number;
        $this->external_id    = $payload->external_id;
        $this->created_at     = $payload->created_at;
        $this->updated_at     = $payload->updated_at;
    }
}
