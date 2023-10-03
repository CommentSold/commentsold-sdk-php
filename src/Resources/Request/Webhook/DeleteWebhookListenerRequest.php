<?php

declare(strict_types=1);

namespace Resources\Request\Webhook;

use Resources\Request\AbstractRequest;

class DeleteWebhookListenerRequest extends AbstractRequest
{
    public function __construct(public int $webhook_id)
    {
    }
}
