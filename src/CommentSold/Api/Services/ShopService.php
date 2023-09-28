<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\ShopClient;

class ShopService extends abstractService
{
    /**
     * Updates the address for the shop
     */
    public function updateShop(array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/shop", $payload);

        return $response->toObject();
    }
}
