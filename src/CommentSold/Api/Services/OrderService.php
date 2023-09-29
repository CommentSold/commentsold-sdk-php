<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Order\CancelOrderLineItemRequest;
use CommentSold\Api\Resources\Request\Order\CancelOrderRequest;
use CommentSold\Api\Resources\Request\Order\CreateOrderRequest;
use CommentSold\Api\Resources\Request\Order\GetOrdersRequest;
use CommentSold\Api\ShopClient;

class OrderService extends abstractService
{
    /**
     * Returns a paginated list of orders
     */
    public function getOrders(GetOrdersRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/orders", $payload);

        return $response->toObject();
    }

    /**
     * Create an order
     */
    public function createOrder(CreateOrderRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/orders", $payload);

        return $response->toObject();
    }

    /**
     * Cancels the entire order
     */
    public function cancelOrder(CancelOrderRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/orders/{$payload->order_id}/cancel");

        return $response->toObject();
    }

    /**
     * Cancel line item from an order
     */
    public function cancelOrderLineItem(CancelOrderLineItemRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/orders/{$payload->order_id}/{$payload->line_item_id}/cancel");

        return $response->toObject();
    }
}
