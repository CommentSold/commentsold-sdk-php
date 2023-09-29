<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Account;

use CommentSold\Api\Resources\Request\AbstractRequest;

class CreateShopRequest extends AbstractRequest
{
    public string $shop_id;
    public string $shop_name;
    public string $company_name;
    public string $company_phone;
    public string $street_address;
    public string $city;
    public string $state;
    public string $country_code;
    public string $zip;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $webhook_url;
    public ?string $account_type;
    public ?bool $no_customer_emails;

    public function __construct(array $payload)
    {
        $this->shop_id            = $payload['shop_id'];
        $this->shop_name          = $payload['shop_name'];
        $this->company_name       = $payload['company_name'];
        $this->company_phone      = $payload['company_phone'];
        $this->street_address     = $payload['street_address'];
        $this->city               = $payload['city'];
        $this->state              = $payload['state'];
        $this->country_code       = $payload['country_code'];
        $this->zip                = $payload['zip'];
        $this->first_name         = $payload['first_name'];
        $this->last_name          = $payload['last_name'];
        $this->email              = $payload['email'];
        $this->webhook_url        = $payload['webhook_url'];
        $this->account_type       = $payload['account_type'] ?? null;
        $this->no_customer_emails = $payload['no_customer_emails'] ?? null;
    }
}
