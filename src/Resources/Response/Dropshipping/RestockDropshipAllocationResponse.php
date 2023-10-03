<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Dropshipping;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class RestockDropshipAllocationResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'successfully_allocated_products'   => $payload->data->successfully_allocated_products,
            'unsuccessfully_allocated_products' => $payload->data->unsuccessfully_allocated_products,
        ];
    }
}
