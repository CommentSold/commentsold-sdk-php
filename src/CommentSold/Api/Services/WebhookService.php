<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Webhook\AddWebhookListenerRequest;
use CommentSold\Api\Resources\Request\Webhook\DeleteWebhookListenerRequest;
use CommentSold\Api\Resources\Request\Webhook\GetWebhookListenersRequest;
use CommentSold\Api\ShopClient;

class WebhookService extends abstractService
{
    /**
     * Returns a paginated list of Webhooks
     */
    public function getWebhookListeners(GetWebhookListenersRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/webhooks", $payload);

        return $response->toObject();
    }

    /**
     * Subscribe to a Webhook topic
     */
    public function addWebhookListener(AddWebhookListenerRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/webhooks", $payload);

        return $response->toObject();
    }

    /**
     * Unsubscribe a Webhook
     */
    public function deleteWebhookListener(DeleteWebhookListenerRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/webhooks/{$payload->webhook_id}");

        return $response->toObject();
    }
}
