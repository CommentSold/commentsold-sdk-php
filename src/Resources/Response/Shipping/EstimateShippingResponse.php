<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Shipping;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class EstimateShippingResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new ShippingEstimate($payload);
    }
}
