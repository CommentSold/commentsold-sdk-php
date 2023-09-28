<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\ShopClient;

class WebhookService extends abstractService
{
    /**
     * Returns a paginated list of Webhooks
     */
    public function getWebhookListeners(int $page = 1, int $perPage = self::PER_PAGE)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/webhooks?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Subscribe to a Webhook topic
     */
    public function addWebhookListener(array $payload)
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
    public function deleteWebhookListener(int $webhookId)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/webhooks/{$webhookId}");

        return $response->toObject();
    }
}
