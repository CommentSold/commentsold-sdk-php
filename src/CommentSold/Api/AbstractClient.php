<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Clients\Rest;

abstract class AbstractClient
{
    protected Rest $restClient;

    public function __construct(private readonly string $token)
    {
        $this->restClient = new Rest($this->token);
    }

    public function getClient(): Rest
    {
        return $this->restClient;
    }

    abstract public function getShopId(): string;
}