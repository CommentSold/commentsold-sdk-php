<?php

declare(strict_types=1);

namespace CommentSold\Api\Clients;

use CommentSold\Api\Exception\CommentSoldException;
use CommentSold\Api\Exception\InvalidResponseException;
use CommentSold\Api\Response;
use GuzzleHttp\Client;

class Rest
{
    private const API_URL = 'https://openapi.commentsold.com/v1';

    public function __construct(private readonly string $token)
    {
    }

    public function get(string $endpoint, array $payload = []): object
    {
        return $this->send('get', $endpoint, $payload);
    }

    public function post(string $endpoint, array $payload = []): object
    {
        return $this->send('post', $endpoint, $payload);
    }

    public function put(string $endpoint, array $payload = []): object
    {
        return $this->send('put', $endpoint, $payload);
    }

    public function patch(string $endpoint, array $payload = []): object
    {
        return $this->send('patch', $endpoint, $payload);
    }

    public function delete(string $endpoint, array $payload = []): object
    {
        return $this->send('delete', $endpoint, $payload);
    }

    private function send(string $method, string $endpoint, array $payload): Response
    {
        try {
            $client = new Client();
            $response = $client->$method(
                self::API_URL.'/'.ltrim($endpoint, '/'),
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this->token,
                        'Content-Type'  => 'application/json',
                        'Accept'        => 'application/json',
                    ],
                    'body'    => json_encode($payload),
                ]
            );
            $apiResponse = new Response($response);

            if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
                throw new InvalidResponseException($apiResponse->getRawBody(), $response->getStatusCode());
            }

            return $apiResponse;
        } catch (\Throwable $e) {
            throw new CommentSoldException($e->getMessage(), $e->getCode());
        }
    }
}
