<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Account;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetIframeUrlRequest extends AbstractRequest
{
    public string $page;

    public function __construct(array $payload)
    {
        $this->page = $payload['page'];
    }
}
