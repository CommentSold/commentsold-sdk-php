<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Customer;

use CommentSold\Api\Resources\Request\AbstractRequest;

class UpdateCustomerRequest extends AbstractRequest
{
    public function __construct(
        public int $customer_id,
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
