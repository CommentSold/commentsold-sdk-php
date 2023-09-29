<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\ShopClient;

class DropshippingService extends abstractService
{
    /**
     * Start allocations for dropship products
     */
    public function startDropshipAllocation(array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/dropshipping/allocations", $payload);

        return $response->toObject();
    }

    /**
     * Restock allocations for dropship products
     */
    public function restockDropshipAllocation(array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/dropshipping/allocations", $payload);

        return $response->toObject();
    }
}
