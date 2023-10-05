<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Webhook;

use CommentSold\Resources\AbstractResource;

class WebhookListenerCollection extends AbstractResource
{
    /** @var array[WebhookListener] */
    public array $webhook_listeners;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new WebhookListener($item);
        }

        $this->webhook_listeners = $array;
    }
}
