<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Account;

use CommentSold\Resources\Request\AbstractRequest;

class GetOauthUrlRequest extends AbstractRequest
{
    /**
     * @param  string[]  $scopes
     */
    public function __construct(
        public array $scopes,
        public string $redirect_uri,
        public string $external_shop_id,
    ) {
    }
}
