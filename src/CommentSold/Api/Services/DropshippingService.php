<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Dropshipping\RestockDropshippingAllocationRequest;
use CommentSold\Api\Resources\Request\Dropshipping\StartDropshippingAllocationRequest;
use CommentSold\Api\Resources\Response\Dropshipping\RestockDropshipAllocationResponse;
use CommentSold\Api\Resources\Response\Dropshipping\StartDropshipAllocationResponse;
use CommentSold\Api\ShopClient;

class DropshippingService extends abstractService
{
    /**
     * Start allocations for dropship products
     */
    public function startDropshipAllocation(StartDropshippingAllocationRequest $payload): StartDropshipAllocationResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/dropshipping/allocations", $payload);

        return new StartDropshipAllocationResponse($response);
    }

    /**
     * Restock allocations for dropship products
     */
    public function restockDropshipAllocation(RestockDropshippingAllocationRequest $payload): RestockDropshipAllocationResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/dropshipping/allocations", $payload);

        return new RestockDropshipAllocationResponse($response);
    }
}
