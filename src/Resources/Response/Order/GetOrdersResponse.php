<?php

declare(strict_types=1);

namespace Resources\Response\Order;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

class GetOrdersResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $orders = [];
        foreach ($payload->data ?? [] as $order) {
            $orders[] = new Order($order);
        }

        $this->data       = $orders;
        $this->pagination = new Pagination($payload->pagination);
    }
}
