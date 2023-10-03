<?php

declare(strict_types=1);

namespace Resources\Request\Webhook;

use Resources\Request\AbstractRequest;

class AddWebhookListenerRequest extends AbstractRequest
{
    public function __construct(
        public string $topic,
        public string $url,
    ) {
    }
}
