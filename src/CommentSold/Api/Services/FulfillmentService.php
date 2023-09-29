<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Fulfillment\AddTrackingRequest;
use CommentSold\Api\ShopClient;

class FulfillmentService extends abstractService
{
    /**
     * Add tracking information to a list of line items
     */
    public function addTracking(AddTrackingRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/fulfillment/addTracking", $payload);

        return $response->toObject();
    }
}
