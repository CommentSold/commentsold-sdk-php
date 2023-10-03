<?php

declare(strict_types=1);

namespace CommentSold\Services;

use CommentSold\AbstractClient;
use CommentSold\Clients\Rest;

abstract class AbstractApi
{
    protected Rest $restClient;

    public function __construct(protected readonly AbstractClient $client)
    {
        $this->restClient = $this->client->getClient();
    }
}
