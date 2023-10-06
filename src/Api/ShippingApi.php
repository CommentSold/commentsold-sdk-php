<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Shipping\EstimateShippingRequest;
use CommentSold\Resources\Response\Shipping\EstimateShippingResponse;
use CommentSold\ShopClient;

class ShippingApi extends AbstractApi
{
    /**
     * Calculate the estimated shipping price for a group of variants
     */
    public function estimateShipping(EstimateShippingRequest $payload): EstimateShippingResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/shipping_calculator", $payload);

        return new EstimateShippingResponse($response);
    }
}
