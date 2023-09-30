<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Webhook;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Resources\Response\Pagination;
use CommentSold\Api\Response;

class GetWebhookListenersResponse extends AbstractResponse
{
    /** @var array[Webhook] */
    public array $data;
    public Pagination $pagination;

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
