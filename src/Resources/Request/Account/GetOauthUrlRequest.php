<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Account;

use CommentSold\Resources\Request\AbstractRequest;

class GetOauthUrlRequest extends AbstractRequest
{
    public function __construct(
        /** @var string[] */
        public array $scopes,
        public string $redirect_uri,
    ) {
    }
}
