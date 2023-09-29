<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Webhook;

use CommentSold\Api\Resources\Request\AbstractRequest;

class AddWebhookListenerRequest extends AbstractRequest
{
    public function __construct(
        public string $topic,
        public string $url,
    ) {
    }
}
