<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Dropshipping;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class StartDropshipAllocationResponse extends AbstractResponse
{
    public array $successfully_allocated_products;
    public array $unsuccessfully_allocated_products;

    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->successfully_allocated_products   = $payload->data->successfully_allocated_products;
        $this->unsuccessfully_allocated_products = $payload->data->unsuccessfully_allocated_products;
    }
}
