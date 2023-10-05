<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Resources\Response\Pagination;
use CommentSold\Response;

class GetProductsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data       = new ProductCollection($payload->data);
        $this->pagination = new Pagination($payload->pagination);
    }
}
