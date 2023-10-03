<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Webhook\AddWebhookListenerRequest;
use Resources\Request\Webhook\DeleteWebhookListenerRequest;
use Resources\Request\Webhook\GetWebhookListenersRequest;
use Resources\Response\Webhook\AddWebhookListenerResponse;
use Resources\Response\Webhook\DeleteWebhookListenerResponse;
use Resources\Response\Webhook\GetWebhookListenersResponse;
use ShopClient;

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
