<?php

declare(strict_types=1);

namespace Resources\Response\Webhook;

use Resources\Response\AbstractResponse;
use Response;

class DeleteWebhookListenerResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
    }
}
