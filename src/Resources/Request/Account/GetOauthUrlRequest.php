<?php

declare(strict_types=1);

namespace Resources\Request\Account;

use Resources\Request\AbstractRequest;

class GetOauthUrlRequest extends AbstractRequest
{
    public function __construct(
        public array $scopes,
        public string $redirect_uri,
    ) {
    }
}
