<?php

declare(strict_types=1);

namespace CommentSold;

use CommentSold\Exception\ApiErrorResponseException;
use CommentSold\Exception\InvalidResponseException;
use Psr\Http\Message\ResponseInterface;

class Response
{
    private string $body = '';

    public function __construct(private readonly ResponseInterface $response)
    {
        if (isset($this->toObject()->error)) {
            throw new ApiErrorResponseException(
                message: $this->toObject()->error,
                responseError: $this->toObject(),
            );
        }

        try {
            $this->body = $this->response->getBody()->getContents();
        } catch (\Throwable $e) {
            throw new InvalidResponseException('Invalid response: '.$e->getMessage());
        }
    }

    public function getRawBody(): string
    {
        return $this->body ?: '';
    }

    /** @return mixed[]|null */
    public function toArray(): ?array
    {
        return json_decode($this->getRawBody(), true);
    }

    public function toObject(): ?object
    {
        return json_decode($this->getRawBody(), false);
    }
}
