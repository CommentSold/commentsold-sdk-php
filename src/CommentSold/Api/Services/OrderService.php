<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Order\CancelOrderLineItemRequest;
use CommentSold\Api\Resources\Request\Order\CancelOrderRequest;
use CommentSold\Api\Resources\Request\Order\CreateOrderRequest;
use CommentSold\Api\Resources\Request\Order\GetOrdersRequest;
use CommentSold\Api\Resources\Response\Order\CancelOrderLineItemResponse;
use CommentSold\Api\Resources\Response\Order\CancelOrderResponse;
use CommentSold\Api\Resources\Response\Order\CreateOrderResponse;
use CommentSold\Api\Resources\Response\Order\GetOrdersResponse;
use CommentSold\Api\ShopClient;

class OrderService extends abstractService
{
    /**
     * Returns a paginated list of orders
     */
    public function getOrders(GetOrdersRequest $payload): GetOrdersResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/orders", $payload);

        return new GetOrdersResponse($response);
    }

    /**
     * Create an order
     */
    public function createOrder(CreateOrderRequest $payload): CreateOrderResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/orders", $payload);

        return new CreateOrderResponse($response);
    }

    /**
     * Cancels the entire order
     */
    public function cancelOrder(CancelOrderRequest $payload): CancelOrderResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/orders/{$payload->order_id}/cancel");

        return new CancelOrderResponse($response);
    }

    /**
     * Cancel line item from an order
     */
    public function cancelOrderLineItem(CancelOrderLineItemRequest $payload): CancelOrderLineItemResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/orders/{$payload->order_id}/{$payload->line_item_id}/cancel");

        return new CancelOrderLineItemResponse($response);
    }
}
