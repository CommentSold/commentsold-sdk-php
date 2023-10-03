<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Customer;

use CommentSold\Resources\Request\AbstractRequest;

class GetCustomerRequest extends AbstractRequest
{
    public function __construct(public int $customer_id)
    {
    }
}
