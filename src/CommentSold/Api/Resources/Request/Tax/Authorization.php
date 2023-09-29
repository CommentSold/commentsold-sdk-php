<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Authorization extends AbstractRequest
{
    public string $company_name;
    public string $username;
    public string $password;
    public string $company_code;

    public function __construct(array $payload)
    {
        $this->company_name = $payload['company_name'];
        $this->username     = $payload['username'];
        $this->password     = $payload['password'];
        $this->company_code = $payload['company_code'];
    }
}
