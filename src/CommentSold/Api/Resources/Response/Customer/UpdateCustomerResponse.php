<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Customer;

use CommentSold\Api\Response;

class UpdateCustomerResponse extends Customer
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        parent::__construct($payload->data);
    }
}
