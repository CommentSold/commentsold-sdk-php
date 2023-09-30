<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Webhook\AddWebhookListenerRequest;
use CommentSold\Api\Resources\Request\Webhook\DeleteWebhookListenerRequest;
use CommentSold\Api\Resources\Request\Webhook\GetWebhookListenersRequest;
use CommentSold\Api\Resources\Response\Webhook\AddWebhookListenerResponse;
use CommentSold\Api\Resources\Response\Webhook\DeleteWebhookListenerResponse;
use CommentSold\Api\Resources\Response\Webhook\GetWebhookListenersResponse;
use CommentSold\Api\ShopClient;

class WebhookService extends abstractService
{
    /**
     * Returns a paginated list of Webhooks
     */
    public function getWebhookListeners(GetWebhookListenersRequest $payload): GetWebhookListenersResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/webhooks", $payload);

        return new GetWebhookListenersResponse($response);
    }

    /**
     * Subscribe to a Webhook topic
     */
    public function addWebhookListener(AddWebhookListenerRequest $payload): AddWebhookListenerResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/webhooks", $payload);

        return new AddWebhookListenerResponse($response);
    }

    /**
     * Unsubscribe a Webhook
     */
    public function deleteWebhookListener(DeleteWebhookListenerRequest $payload): DeleteWebhookListenerResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/webhooks/{$payload->webhook_id}");

        return new DeleteWebhookListenerResponse($response);
    }
}
