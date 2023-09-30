<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Shipping;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class EstimateShippingResponse extends AbstractResponse
{
    public int $shipping_fee;

    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->shipping_fee = $payload->shipping_fee;
    }
}
