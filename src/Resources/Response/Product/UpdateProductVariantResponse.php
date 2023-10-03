<?php

declare(strict_types=1);

namespace Resources\Response\Product;

use Resources\Response\AbstractResponse;
use Response;

class UpdateProductVariantResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Variant($payload->data);
    }
}
