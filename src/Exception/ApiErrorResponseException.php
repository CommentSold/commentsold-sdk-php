<?php

declare(strict_types=1);

namespace CommentSold\Exception;

use Throwable;

class ApiErrorResponseException extends CommentSoldException
{
    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null, public readonly ?object $responseError = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getDetails(): ?object
    {
        return $this->responseError;
    }
}
