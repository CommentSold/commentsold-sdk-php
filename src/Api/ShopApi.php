<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Shop\UpdateShopRequest;
use CommentSold\Resources\Response\Shop\UpdateShopResponse;
use CommentSold\ShopClient;

class ShopApi extends AbstractApi
{
    /**
     * Updates the address for the shop
     */
    public function updateShop(UpdateShopRequest $payload): UpdateShopResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch($this->baseUrl."{$this->client->getShopId()}/shop", $payload);

        return new UpdateShopResponse($response);
    }
}
