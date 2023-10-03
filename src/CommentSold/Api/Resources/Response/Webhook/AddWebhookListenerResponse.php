<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Webhook;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class AddWebhookListenerResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Webhook($payload->data);
    }
}
