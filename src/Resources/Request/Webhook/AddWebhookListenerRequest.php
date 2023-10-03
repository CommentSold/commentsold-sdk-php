<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Webhook;

use CommentSold\Resources\Request\AbstractRequest;

class AddWebhookListenerRequest extends AbstractRequest
{
    public function __construct(
        public string $topic,
        public string $url,
    ) {
    }
}
