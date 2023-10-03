<?php

declare(strict_types=1);

namespace Resources\Response\Account;

use Resources\Response\AbstractResponse;
use Response;

class GetIframeUrlResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'url' => $payload->url,
        ];
    }
}
