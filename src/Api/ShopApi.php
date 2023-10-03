<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Shop\UpdateShopRequest;
use Resources\Response\Shop\UpdateShopResponse;
use ShopClient;

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

        $response = $this->restClient->patch("{$this->client->getShopId()}/shop", $payload);

        return new UpdateShopResponse($response);
    }
}
