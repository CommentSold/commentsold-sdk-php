<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Shop;

use CommentSold\Api\Resources\Request\AbstractRequest;

class UpdateShopRequest extends AbstractRequest
{
    public ?string $shop_name;
    public ?string $company_name;
    public ?string $company_phone;
    public ?string $street_address;
    public ?string $city;
    public ?string $state;
    public ?string $zip;
    public ?string $country_code;

    public function __construct(array $payload)
    {
        $this->shop_name      = $payload['shop_name'];
        $this->company_name   = $payload['company_name'];
        $this->company_phone  = $payload['company_phone'];
        $this->street_address = $payload['street_address'];
        $this->city           = $payload['city'];
        $this->state          = $payload['state'];
        $this->zip            = $payload['zip'];
        $this->country_code   = $payload['country_code'];
    }
}
