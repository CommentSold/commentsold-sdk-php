<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Customer;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Resources\Response\Pagination;
use CommentSold\Response;

class SearchCustomersResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $customers = [];
        foreach ($payload->data->customers ?? [] as $customer) {
            $customers[] = new Customer($customer);
        }

        $this->data       = $customers;
        $this->pagination = new Pagination($payload->pagination);
    }
}
