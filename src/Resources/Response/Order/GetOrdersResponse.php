<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Order;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Resources\Response\Pagination;
use CommentSold\Response;

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
