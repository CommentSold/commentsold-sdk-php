<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Clients\Rest;
use CommentSold\Api\Exception\InvalidTokenException;
use CommentSold\Api\Exception\MissingArgumentException;

class Client
{
    private Rest $restClient;

    public function __construct(
        private string $partnerId,
        private ?string $shopId = null
    ) {
        $this->restClient = new Rest();
    }

    public function getPartnerToken(string $privateKey): string
    {
        if (! $privateKey) {
            throw new MissingArgumentException('API Token Key missing');
        }

        $token = $this->restClient->getToken($privateKey, $this->partnerId);

        if (! $token) {
            throw new InvalidTokenException('Unable to retrieve token');
        }

        return $token;
    }

    public function getShopToken(string $privateKey): string
    {
        if (! $privateKey) {
            throw new MissingArgumentException('API Token Key missing');
        }

        if (! $this->shopId) {
            throw new MissingArgumentException('Shop ID missing');
        }

        $token = $this->restClient->getToken($privateKey, $this->partnerId, $this->shopId);

        if (! $token) {
            throw new InvalidTokenException('Unable to retrieve token');
        }

        return $token;
    }

    public function addTracking(string $shopToken, array $lineItemIds, array $shippingInfo)
    {
        if (! $this->shopId) {
            throw new MissingArgumentException('Shop ID missing');
        }

        return $this->restClient->post($shopToken, "{$this->shopId}/fulfillment/addTracking", [
            'lineItemIds'  => $lineItemIds,
            'shippingInfo' => $shippingInfo,
        ]);
    }
}
