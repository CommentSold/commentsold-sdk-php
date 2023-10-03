<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Order\CancelOrderLineItemRequest;
use Resources\Request\Order\CancelOrderRequest;
use Resources\Request\Order\CreateOrderRequest;
use Resources\Request\Order\GetOrdersRequest;
use Resources\Response\Order\CancelOrderLineItemResponse;
use Resources\Response\Order\CancelOrderResponse;
use Resources\Response\Order\CreateOrderResponse;
use Resources\Response\Order\GetOrdersResponse;
use ShopClient;

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
