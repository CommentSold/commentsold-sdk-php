<?php

declare(strict_types=1);

namespace Resources\Request\Customer;

use Resources\Request\AbstractRequest;

class GetCustomerByExternalIdRequest extends AbstractRequest
{
    public function __construct(public string $external_customer_id)
    {
    }
}
