<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

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
