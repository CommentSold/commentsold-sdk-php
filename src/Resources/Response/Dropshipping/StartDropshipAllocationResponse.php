<?php

declare(strict_types=1);

namespace Resources\Response\Dropshipping;

use Resources\Response\AbstractResponse;
use Response;

class StartDropshipAllocationResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'successfully_allocated_products'   => $payload->data->successfully_allocated_products,
            'unsuccessfully_allocated_products' => $payload->data->unsuccessfully_allocated_products,
        ];
    }
}
