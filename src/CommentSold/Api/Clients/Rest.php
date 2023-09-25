<?php

declare(strict_types=1);

namespace CommentSold\Api\Clients;

use CommentSold\Api\Exception\CommentSoldException;
use CommentSold\Api\Response;
use GuzzleHttp\Client;

class Rest
{
    private const TOKEN_SERVICE_URL = 'https://tokens.cs-api.com';
    private const API_URL = 'https://openapi.commentsold.com/v1';

    public const PER_PAGE = 10;

    public function get(string $token, string $endpoint, array $payload = []): object
    {
        return $this->send('get', $endpoint, $payload, $token);
    }

    public function post(string $token, string $endpoint, array $payload = []): object
    {
        return $this->send('post', $endpoint, $payload, $token);
    }

    public function put(string $token, string $endpoint, array $payload = []): object
    {
        return $this->send('put', $endpoint, $payload, $token);
    }

    public function patch(string $token, string $endpoint, array $payload = []): object
    {
        return $this->send('patch', $endpoint, $payload, $token);
    }

    public function delete(string $token, string $endpoint, array $payload = []): object
    {
        return $this->send('delete', $endpoint, $payload, $token);
    }

    public function getToken(string $privateKey, string $partnerId, ?string $shopId = null): string
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

            return $apiResponse->toObject()->token;
        } catch (\Throwable $e) {
            throw new CommentSoldException($e->getMessage(), $e->getCode());
        }
    }

    private function send(string $method, string $endpoint, array $payload, string $token): object
    {
        try {
            $client = new Client();
            $response = $client->$method(
                self::API_URL.'/'.ltrim($endpoint, '/'),
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.$token,
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                    ],
                    'body'    => json_encode($payload),
                ]
            );
            $apiResponse = new Response($response);

            if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
                throw new CommentSoldException($apiResponse->getRawBody(), $response->getStatusCode());
            }

            return $apiResponse->toObject();
        } catch (\Throwable $e) {
            throw new CommentSoldException($e->getMessage(), $e->getCode());
        }
    }
}
