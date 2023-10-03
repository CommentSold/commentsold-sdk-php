<?php

declare(strict_types=1);

namespace CommentSold\Services;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Dropshipping\RestockDropshippingAllocationRequest;
use CommentSold\Resources\Request\Dropshipping\StartDropshippingAllocationRequest;
use CommentSold\Resources\Response\Dropshipping\RestockDropshipAllocationResponse;
use CommentSold\Resources\Response\Dropshipping\StartDropshipAllocationResponse;
use CommentSold\ShopClient;

class DropshippingApi extends AbstractApi
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
