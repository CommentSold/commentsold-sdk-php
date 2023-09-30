<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Response;

class CreateOrderResponse extends Order
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        parent::__construct($payload->data);
    }
}
