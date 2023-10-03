<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Shop\UpdateShopRequest;
use CommentSold\Api\Resources\Response\Shop\UpdateShopResponse;
use CommentSold\Api\ShopClient;

class ShopService extends abstractService
{
    /**
     * Updates the address for the shop
     */
    public function updateShop(UpdateShopRequest $payload): UpdateShopResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/shop", $payload);

        return new UpdateShopResponse($response);
    }
}
