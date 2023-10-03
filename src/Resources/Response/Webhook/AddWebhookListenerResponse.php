<?php

declare(strict_types=1);

namespace Resources\Response\Webhook;

use Resources\Response\AbstractResponse;
use Response;

class AddWebhookListenerResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Webhook($payload->data);
    }
}
