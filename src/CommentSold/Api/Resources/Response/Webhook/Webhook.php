<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Webhook;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Webhook extends AbstractResponse
{
    public int $id;
    public string $topic;
    public string $url;

    public function __construct(object $payload)
    {
        $this->id    = $payload->id;
        $this->topic = $payload->topic;
        $this->url   = $payload->url;
    }
}
