<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidContextException;

class FulfillmentService extends abstractService
{
    /**
     * Add tracking information to a list of line items
     */
    public function addTracking(array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/fulfillment/addTracking", $payload);

        return $response->toObject();
    }
}
