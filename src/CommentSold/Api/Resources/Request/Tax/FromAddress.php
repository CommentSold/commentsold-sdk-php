<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

class FromAddress extends AbstractRequest
{
    public string $street_address;
    public string $city;
    public string $state;
    public string $zip;
    public string $country_code;

    public function __construct(array $payload)
    {
        $this->street_address = $payload['street_address'];
        $this->city           = $payload['city'];
        $this->state          = $payload['state'];
        $this->zip            = $payload['zip'];
        $this->country_code   = $payload['country_code'];
    }
}
