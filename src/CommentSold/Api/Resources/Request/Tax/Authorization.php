<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Authorization extends AbstractRequest
{
    public function __construct(
        public string $company_name,
        public string $username,
        public string $password,
        public string $company_code,
    ) {
    }
}
