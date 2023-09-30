<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Customer;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Customer extends AbstractResponse
{
    public int $id;
    public ?string $name;
    public ?string $email;
    public ?string $street_address;
    public ?string $city;
    public ?string $state;
    public ?string $zip;
    public ?string $country_code;
    public ?string $phone_number;
    public ?string $external_id;
    public int $created_at;
    public int $updated_at;

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
