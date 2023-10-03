<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Account;

use CommentSold\Resources\Request\AbstractRequest;

class CreateShopRequest extends AbstractRequest
{
    public function __construct(
        public string $shop_id,
        public string $shop_name,
        public string $company_name,
        public string $company_phone,
        public string $street_address,
        public string $city,
        public string $state,
        public string $country_code,
        public string $zip,
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $webhook_url,
        public ?string $account_type,
        public ?bool $no_customer_emails,
    ) {
    }
}
