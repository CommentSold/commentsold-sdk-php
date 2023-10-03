<?php

declare(strict_types=1);

namespace Resources\Request\Customer;

use Resources\Request\AbstractRequest;

class GetCustomerRequest extends AbstractRequest
{
    public function __construct(public int $customer_id)
    {
    }
}
