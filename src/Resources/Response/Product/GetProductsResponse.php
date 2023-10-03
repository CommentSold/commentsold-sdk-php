<?php

declare(strict_types=1);

namespace Resources\Response\Product;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

class GetProductsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $products = [];
        foreach ($payload->data ?? [] as $product) {
            $products[] = new Product($product);
        }

        $this->data       = $products;
        $this->pagination = new Pagination($payload->pagination);
    }
}
