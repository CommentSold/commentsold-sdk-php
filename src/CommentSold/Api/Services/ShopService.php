<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidContextException;

class ShopService extends abstractService
{
    /**
     * Updates the address for the shop
     */
    public function updateShop(array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/shop", $payload);

        return $response->toObject();
    }
}
