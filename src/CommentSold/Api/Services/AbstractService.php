<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\AbstractClient;
use CommentSold\Api\Clients\Rest;

abstract class AbstractService
{
    public const PER_PAGE = 10;

    protected Rest $restClient;

    public function __construct(protected readonly AbstractClient $client)
    {
        $this->restClient = $this->client->getClient();
    }
}
