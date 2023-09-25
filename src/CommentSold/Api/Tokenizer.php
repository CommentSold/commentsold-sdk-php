<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Clients\Rest;
use CommentSold\Api\Exception\InvalidTokenException;

class Tokenizer
{
    private Rest $restClient;

    public function __construct(
        private readonly string $privateKey,
        private readonly string $partnerId
    ) {
        $this->restClient = new Rest();
    }

    public function getPartnerToken(): string
    {
        $token = $this->restClient->getToken($this->privateKey, $this->partnerId);

        if (! $token) {
            throw new InvalidTokenException('Unable to retrieve token');
        }

        return $token;
    }

    public function getShopToken(string $shopId): string
    {
        $token = $this->restClient->getToken($this->privateKey, $this->partnerId, $shopId);

        if (! $token) {
            throw new InvalidTokenException('Unable to retrieve token');
        }

        return $token;
    }
}
