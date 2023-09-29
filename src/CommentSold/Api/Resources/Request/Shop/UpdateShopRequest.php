<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Shop;

use CommentSold\Api\Resources\Request\AbstractRequest;

class UpdateShopRequest extends AbstractRequest
{
    public function __construct(
        public ?string $shop_name,
        public ?string $company_name,
        public ?string $company_phone,
        public ?string $street_address,
        public ?string $city,
        public ?string $state,
        public ?string $zip,
        public ?string $country_code,
    ) {
    }
}
