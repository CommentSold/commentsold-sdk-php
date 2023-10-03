<?php

declare(strict_types=1);

namespace Resources\Request\Tax;

use Resources\Request\AbstractRequest;

class FromAddress extends AbstractRequest
{
    public function __construct(
        public string $street_address,
        public string $city,
        public string $state,
        public string $zip,
        public string $country_code,
    ) {
    }
}
