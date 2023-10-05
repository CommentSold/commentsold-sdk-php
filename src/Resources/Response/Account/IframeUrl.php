<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Account;

use CommentSold\Resources\AbstractResource;

class IframeUrl extends AbstractResource
{
    public readonly string $url;

    public function __construct(object $payload)
    {
        $this->url = $payload->url;
    }
}
