<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Account;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class GetIframeUrlResponse extends AbstractResponse
{
    public string $url;

    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->url = $payload->url;
    }
}
