<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Webhook;

use CommentSold\Api\Response;

class AddWebhookListenerResponse extends Webhook
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        parent::__construct($payload->data);
    }
}
