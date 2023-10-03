<?php

declare(strict_types=1);

namespace Resources\Response\Order;

use Resources\Response\AbstractResponse;
use Response;

class CancelOrderLineItemResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
    }
}
