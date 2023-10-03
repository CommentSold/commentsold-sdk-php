<?php

declare(strict_types=1);

use Exception\ApiErrorResponseException;
use Exception\InvalidResponseException;
use Psr\Http\Message\ResponseInterface;

class Response
{
    public function __construct(private readonly ResponseInterface $response)
    {
        if (isset($this->toObject()->error)) {
            throw new ApiErrorResponseException(
                message: $this->toObject()->error,
                responseError: $this->toObject(),
            );
        }
    }

    public function getRawBody(): string
    {
        try {
            return $this->response->getBody()->getContents();
        } catch (\Throwable $e) {
            throw new InvalidResponseException('Invalid response: '.$e->getMessage());
        }
    }

    public function toArray()
    {
        return json_decode($this->getRawBody(), true);
    }

    public function toObject()
    {
        return json_decode($this->getRawBody(), false);
    }
}
