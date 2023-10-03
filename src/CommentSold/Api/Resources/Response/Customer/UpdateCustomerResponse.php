<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Customer;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class UpdateCustomerResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Customer($payload->data);
    }
}
