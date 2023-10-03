<?php

declare(strict_types=1);

namespace Clients;

use Exception\CommentSoldException;
use Exception\InvalidResponseException;
use GuzzleHttp\Client;
use Resources\Request\AbstractRequest;
use Response;

class Rest
{
    private const API_URL = 'https://openapi.commentsold.com/v1';

    public function __construct(private readonly string $token)
    {
    }

    public function get(string $endpoint, ?AbstractRequest $payload = null): Response
    {
        if ($payload) {
            $endpoint .= '?'.http_build_query($payload->toArray());
        }

        return $this->send('get', $endpoint, $payload);
    }

    public function post(string $endpoint, ?AbstractRequest $payload = null): Response
    {
        return $this->send('post', $endpoint, $payload);
    }

    public function put(string $endpoint, ?AbstractRequest $payload = null): Response
    {
        return $this->send('put', $endpoint, $payload);
    }

    public function patch(string $endpoint, ?AbstractRequest $payload = null): Response
    {
        return $this->send('patch', $endpoint, $payload);
    }

    public function delete(string $endpoint, ?AbstractRequest $payload = null): Response
    {
        return $this->send('delete', $endpoint, $payload);
    }

    private function send(string $method, string $endpoint, ?AbstractRequest $payload = null): Response
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
                    'body'    => $payload?->toJson(),
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
