<?php

declare(strict_types=1);

namespace CommentSold\Services;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Webhook\AddWebhookListenerRequest;
use CommentSold\Resources\Request\Webhook\DeleteWebhookListenerRequest;
use CommentSold\Resources\Request\Webhook\GetWebhookListenersRequest;
use CommentSold\Resources\Response\Webhook\AddWebhookListenerResponse;
use CommentSold\Resources\Response\Webhook\DeleteWebhookListenerResponse;
use CommentSold\Resources\Response\Webhook\GetWebhookListenersResponse;
use CommentSold\ShopClient;

class WebhookApi extends AbstractApi
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
