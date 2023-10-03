<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Customer;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class GetCustomerByExternalIdResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Customer($payload->data);
    }
}
