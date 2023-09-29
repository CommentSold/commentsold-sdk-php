<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Customer;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetCustomerByExternalIdRequest extends AbstractRequest
{
    public function __construct(public string $external_customer_id)
    {
    }
}
