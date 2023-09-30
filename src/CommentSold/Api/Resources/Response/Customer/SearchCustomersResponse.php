<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Customer;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Resources\Response\Pagination;
use CommentSold\Api\Response;

class SearchCustomersResponse extends AbstractResponse
{
    /** @var array[Customer] */
    public array $data;
    public Pagination $pagination;

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
