<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Order\CancelOrderLineItemRequest;
use CommentSold\Resources\Request\Order\CancelOrderRequest;
use CommentSold\Resources\Request\Order\CreateOrderRequest;
use CommentSold\Resources\Request\Order\GetOrdersRequest;
use CommentSold\Resources\Response\Order\CancelOrderLineItemResponse;
use CommentSold\Resources\Response\Order\CancelOrderResponse;
use CommentSold\Resources\Response\Order\CreateOrderResponse;
use CommentSold\Resources\Response\Order\GetOrdersResponse;
use CommentSold\ShopClient;

class OrderApi extends AbstractApi
{
    /**
     * Returns a paginated list of orders
     */
    public function getOrders(GetOrdersRequest $payload): GetOrdersResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/orders", $payload);

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

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/orders", $payload);

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

        $response = $this->restClient->put($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/orders/{$payload->order_id}/cancel");

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

        $response = $this->restClient->put($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/orders/{$payload->order_id}/{$payload->line_item_id}/cancel");

        return new CancelOrderLineItemResponse($response);
    }
}
