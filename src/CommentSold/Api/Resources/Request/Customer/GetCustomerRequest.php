<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Customer;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetCustomerRequest extends AbstractRequest
{
    public function __construct(public int $customer_id)
    {
    }
}
