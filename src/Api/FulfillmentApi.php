<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Fulfillment\AddTrackingRequest;
use Resources\Response\Fulfillment\AddTrackingResponse;
use ShopClient;

class FulfillmentApi extends AbstractApi
{
    /**
     * Add tracking information to a list of line items
     */
    public function addTracking(AddTrackingRequest $payload): AddTrackingResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/fulfillment/addTracking", $payload);

        return new AddTrackingResponse($response);
    }
}
