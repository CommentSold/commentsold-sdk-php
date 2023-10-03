<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Customer;

use CommentSold\Resources\Request\AbstractRequest;

class CreateCustomerRequest extends AbstractRequest
{
    public function __construct(
        public string $external_customer_id,
        public string $name,
        public string $street_address,
        public string $city,
        public string $state,
        public string $zip,
        public string $country_code,
        public ?string $phone_number = null,
        public ?string $email = null,
        public ?string $apartment = null,
    ) {
    }
}
