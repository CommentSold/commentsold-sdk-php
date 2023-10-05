<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Account;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class GetIframeUrlResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new IframeUrl($payload);
    }
}
