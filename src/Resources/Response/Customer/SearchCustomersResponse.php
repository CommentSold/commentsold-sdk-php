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

        $this->data       = new CustomerCollection($payload->data);
        $this->pagination = new Pagination($payload->pagination);
    }
}
