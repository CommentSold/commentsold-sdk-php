<?php

declare(strict_types=1);

namespace Resources\Response\Product;

use Resources\Response\AbstractResponse;
use Response;

class UpdateProductResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Product($payload->data);
    }
}
