<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Webhook;

use CommentSold\Api\Resources\Request\AbstractRequest;

class DeleteWebhookListenerRequest extends AbstractRequest
{
    public int $webhook_id;

    public function __construct(int $webhook_id)
    {
        $this->webhook_id = $webhook_id;
    }
}
