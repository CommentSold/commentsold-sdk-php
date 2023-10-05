<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\AbstractClient;
use CommentSold\Clients\Rest;

abstract class AbstractApi
{
    protected Rest $restClient;
    protected const API_VERSION = 'v1';

    public function __construct(protected readonly AbstractClient $client)
    {
        $this->restClient = $this->client->getClient();
    }
}
