<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Account;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetOauthUrlRequest extends AbstractRequest
{
    public array $scopes;
    public string $redirect_uri;

    public function __construct(array $payload)
    {
        $this->scopes       = $payload['scopes'];
        $this->redirect_uri = $payload['redirect_uri'];
    }
}
