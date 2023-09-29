<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Customer;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetCustomerRequest extends AbstractRequest
{
    public int $customer_id;

    public function __construct(int $customer_id)
    {
        $this->customer_id = $customer_id;
    }
}
