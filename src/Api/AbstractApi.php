<?php

declare(strict_types=1);

namespace Api;

use AbstractClient;
use Clients\Rest;

abstract class AbstractApi
{
    protected Rest $restClient;

    public function __construct(protected readonly AbstractClient $client)
    {
        $this->restClient = $this->client->getClient();
    }
}
