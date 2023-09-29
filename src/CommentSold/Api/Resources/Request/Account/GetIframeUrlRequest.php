<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Account;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetIframeUrlRequest extends AbstractRequest
{
    public function __construct(public string $page)
    {
    }
}
