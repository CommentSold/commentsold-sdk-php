<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Webhook;

use CommentSold\Api\Resources\AbstractResource;

class Webhook extends AbstractResource
{
    public readonly int $id;
    public readonly string $topic;
    public readonly string $url;

    public function __construct(object $payload)
    {
        $this->id    = $payload->id;
        $this->topic = $payload->topic;
        $this->url   = $payload->url;
    }
}
