<?php

declare(strict_types=1);

namespace Resources\Response\Webhook;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

class GetWebhookListenersResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $webhooks = [];
        foreach ($payload->data ?? [] as $webhook) {
            $webhooks[] = new Webhook($webhook);
        }

        $this->data       = $webhooks;
        $this->pagination = new Pagination($payload->pagination);
    }
}
