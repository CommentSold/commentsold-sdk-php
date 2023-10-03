<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Webhook;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Resources\Response\Pagination;
use CommentSold\Response;

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
