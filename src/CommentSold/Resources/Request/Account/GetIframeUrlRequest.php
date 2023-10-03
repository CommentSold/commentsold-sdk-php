<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Account;

use CommentSold\Resources\Request\AbstractRequest;

class GetIframeUrlRequest extends AbstractRequest
{
    public function __construct(public string $page)
    {
    }
}
