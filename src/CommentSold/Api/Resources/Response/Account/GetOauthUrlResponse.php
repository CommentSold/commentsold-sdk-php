<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Account;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class GetOauthUrlResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'url' => $payload->url,
        ];
    }
}
