<?php

declare(strict_types=1);

namespace Resources\Response\Shipping;

use Resources\Response\AbstractResponse;
use Response;

class EstimateShippingResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'shipping_fee' => $payload->shipping_fee,
        ];
    }
}
