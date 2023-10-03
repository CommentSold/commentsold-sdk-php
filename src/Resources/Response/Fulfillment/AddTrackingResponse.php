<?php

declare(strict_types=1);

namespace Resources\Response\Fulfillment;

use Resources\Response\AbstractResponse;
use Response;

class AddTrackingResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'id' => $payload->id,
        ];
    }
}
