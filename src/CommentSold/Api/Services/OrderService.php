<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;

class OrderService extends abstractService
{
    /**
     * Returns a paginated list of orders
     */
    public function getOrders(int $page = 1, int $perPage = self::PER_PAGE)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/orders?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Create an order
     */
    public function createOrder(array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/orders", $payload);

        return $response->toObject();
    }

    /**
     * Cancels the entire order
     */
    public function cancelOrder(int $orderId)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/orders/{$orderId}/cancel");

        return $response->toObject();
    }

    /**
     * Cancel line item from an order
     */
    public function cancelOrderLineItem(int $orderId, int $lineItemId)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/orders/{$orderId}/{$lineItemId}/cancel");

        return $response->toObject();
    }
}
