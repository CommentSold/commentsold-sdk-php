<?php

declare(strict_types=1);

namespace CommentSold;

use CommentSold\Clients\Rest;
use CommentSold\Enum\Environment;
use CommentSold\Exception\InvalidArgumentException;

abstract class AbstractClient
{
    protected Rest $restClient;
    protected Environment $environment = Environment::PRODUCTION;
    protected string $baseUrl;

    public function __construct(private readonly string $token)
    {
        $this->restClient = new Rest($this->token);
        $this->baseUrl    = Environment::PRODUCTION->getBaseAPIUrl();
    }

    public function getClient(): Rest
    {
        return $this->restClient;
    }

    public function setEnvironment(Environment $environment, ?string $baseUrl = null): void
    {
        if ($environment == Environment::CUSTOM && ! $baseUrl) {
            throw new InvalidArgumentException('API base URL required for custom environments');
        }

        if ($environment == Environment::CUSTOM) {
            $this->baseUrl = $baseUrl;
        } else {
            $this->baseUrl = $environment->getBaseAPIUrl();
        }

        $this->environment = $environment;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    abstract public function getShopId(): string;
}
