<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Shipping\EstimateShippingRequest;
use Resources\Response\Shipping\EstimateShippingResponse;
use ShopClient;

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

        $response = $this->restClient->post("{$this->client->getShopId()}/shipping_calculator", $payload);

        return new EstimateShippingResponse($response);
    }
}
