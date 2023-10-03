<?php

declare(strict_types=1);

namespace Resources\Response\Order;

use Resources\Response\AbstractResponse;
use Response;

class CreateOrderResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Order($payload->data);
    }
}
