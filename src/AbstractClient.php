<?php

declare(strict_types=1);

namespace CommentSold;

use CommentSold\Clients\Rest;
use CommentSold\Enums\Environment;
use CommentSold\Resources\ClientEnvironment;

abstract class AbstractClient
{
    protected Rest $restClient;
    protected string $baseUrl;

    public function __construct(
        private readonly string $token,
        private readonly ?ClientEnvironment $environment = null
    ) {
        $this->restClient = new Rest($this->token);
        $this->baseUrl    = $this->environment ? $this->environment->baseUrl : Environment::SANDBOX->getBaseAPIUrl();
    }

    public function getClient(): Rest
    {
        return $this->restClient;
    }

    public function getBaseUrl(): string
    {
        return str_ends_with($this->baseUrl, '/') ? $this->baseUrl : $this->baseUrl.'/';
    }

    abstract public function getShopId(): string;
}
