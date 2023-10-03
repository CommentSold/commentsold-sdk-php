<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Customer;

use CommentSold\Resources\Request\AbstractRequest;

class GetCustomerByExternalIdRequest extends AbstractRequest
{
    public function __construct(public string $external_customer_id)
    {
    }
}
