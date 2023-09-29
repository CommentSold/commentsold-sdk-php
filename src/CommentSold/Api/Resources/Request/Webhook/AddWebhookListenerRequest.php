<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Webhook;

use CommentSold\Api\Resources\Request\AbstractRequest;

class AddWebhookListenerRequest extends AbstractRequest
{
    public string $topic;
    public string $url;

    public function __construct(array $payload)
    {
        $this->topic = $payload['topic'];
        $this->url   = $payload['url'];
    }
}
