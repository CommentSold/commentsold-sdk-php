<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Exception\InvalidResponseException;
use Psr\Http\Message\ResponseInterface;

class Response
{
    public function __construct(private readonly ResponseInterface $response)
    {
    }

    public function getRawBody(): string
    {
        try {
            return $this->response->getBody()->getContents();
        } catch (\Throwable $e) {
            throw new InvalidResponseException('Invalid response');
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