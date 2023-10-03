<?php

declare(strict_types=1);

namespace CommentSold;

use CommentSold\Exception\CommentSoldException;
use CommentSold\Exception\InvalidResponseException;
use CommentSold\Exception\InvalidTokenException;
use GuzzleHttp\Client;

class Tokenizer
{
    private const TOKEN_SERVICE_URL = 'https://tokens.cs-api.com';

    public function __construct(
        private readonly string $privateKey,
        private readonly string $partnerId
    ) {
    }

    public function getPartnerToken(): string
    {
        $token = $this->getToken($this->privateKey, $this->partnerId);

        if (! $token) {
            throw new InvalidTokenException('Unable to retrieve token');
        }

        return $token;
    }

    public function getShopToken(string $shopId): string
    {
        $token = $this->getToken($this->privateKey, $this->partnerId, $shopId);

        if (! $token) {
            throw new InvalidTokenException('Unable to retrieve token');
        }

        return $token;
    }

    private function getToken(string $privateKey, string $partnerId, ?string $shopId = null): string
    {
        try {
            $client   = new Client();
            $response = $client->post(
                self::TOKEN_SERVICE_URL.'/tokenize',
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept'       => 'application/json',
                        'x-api-key'    => $privateKey,
                    ],
                    'body'    => json_encode([
                        'audience'   => 'openapi',
                        'partner_id' => $partnerId,
                        'shop'       => $shopId,
                    ]),
                ]
            );
            $apiResponse = new Response($response);

            if (! $response->getStatusCode() == 200) {
                throw new InvalidResponseException($apiResponse->getRawBody(), $response->getStatusCode());
            }

            return $apiResponse->toObject()->token;
        } catch (\Throwable $e) {
            throw new CommentSoldException($e->getMessage(), $e->getCode());
        }
    }
}
