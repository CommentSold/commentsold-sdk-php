<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Webhook;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class AddWebhookListenerResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Webhook($payload->data);
    }
}
