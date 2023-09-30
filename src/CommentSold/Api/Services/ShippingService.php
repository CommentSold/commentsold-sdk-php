<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Shipping\EstimateShippingRequest;
use CommentSold\Api\Resources\Response\Shipping\EstimateShippingResponse;
use CommentSold\Api\ShopClient;

class ShippingService extends abstractService
{
    /**
     * Calculate the estimated shipping price for a group of variants
     */
    public function estimateShipping(EstimateShippingRequest $payload): EstimateShippingResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/shipping_calculator", $payload);

        return new EstimateShippingResponse($response);
    }
}
