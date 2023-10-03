<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Resources\Response\Pagination;
use CommentSold\Api\Response;

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
