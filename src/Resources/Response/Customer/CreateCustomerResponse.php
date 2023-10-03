<?php

declare(strict_types=1);

namespace Resources\Response\Customer;

use Resources\Response\AbstractResponse;
use Response;

class CreateCustomerResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Customer($payload->data);
    }
}
