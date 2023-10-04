<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\AbstractClient;
use CommentSold\Clients\Rest;

abstract class AbstractApi
{
    protected Rest $restClient;
    protected string $baseUrl;

    public function __construct(protected readonly AbstractClient $client)
    {
        $this->restClient = $this->client->getClient();
        $url              = $this->client->getBaseUrl();
        $this->baseUrl    = str_ends_with($url, '/') ? $url : $url.'/';
    }
}
