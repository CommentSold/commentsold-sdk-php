<?php

declare(strict_types=1);

namespace CommentSold;

use CommentSold\Enums\Environment;
use CommentSold\Exception\CommentSoldException;
use CommentSold\Exception\InvalidArgumentException;
use CommentSold\Exception\InvalidResponseException;
use CommentSold\Exception\InvalidTokenException;
use GuzzleHttp\Client;

class Tokenizer
{
    private string $baseUrl;

    public function __construct(
        private readonly string $privateKey,
        private readonly string $partnerId
    ) {
        $this->baseUrl = Environment::PRODUCTION->getBaseTokenizerUrl();
    }

    public function setEnvironment(Environment $environment, ?string $baseUrl = null): void
    {
        if ($environment == Environment::CUSTOM && ! $baseUrl) {
            throw new InvalidArgumentException('Tokenizer base URL required for custom environments');
        }

        if ($environment == Environment::CUSTOM) {
            $this->baseUrl = $baseUrl;
        } else {
            $this->baseUrl = $environment->getBaseTokenizerUrl();
        }
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

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    private function getToken(string $privateKey, string $partnerId, ?string $shopId = null): string
    {
        try {
            $client   = new Client();
            $response = $client->post(
                $this->baseUrl.'/tokenize',
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept'       => 'application/json',
                        'x-api-key'    => $privateKey,
                    ],
                    'body'    => json_encode([
                        'payload' => [
                            'audience'   => 'openapi',
                            'partner_id' => $partnerId,
                            'shop'       => strtolower($shopId),
                        ],
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
