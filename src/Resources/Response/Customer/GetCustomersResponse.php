<?php

declare(strict_types=1);

namespace Resources\Response\Customer;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

class GetCustomersResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $customers = [];
        foreach ($payload->data->customers ?? [] as $customer) {
            $customers[] = new Customer($customer);
        }

        $this->data       = $customers;
        $this->pagination = new Pagination($payload->pagination);
    }
}
