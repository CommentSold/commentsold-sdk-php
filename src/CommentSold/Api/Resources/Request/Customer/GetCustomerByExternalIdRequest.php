<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Customer;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetCustomerByExternalIdRequest extends AbstractRequest
{
    public string $external_customer_id;

    public function __construct(string $external_customer_id)
    {
        $this->external_customer_id = $external_customer_id;
    }
}
