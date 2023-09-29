<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Webhook;

use CommentSold\Api\Resources\Request\AbstractRequest;

class DeleteWebhookListenerRequest extends AbstractRequest
{
    public function __construct(public int $webhook_id)
    {
    }
}
