<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Order;

use CommentSold\Resources\AbstractResource;

class OrderCollection extends AbstractResource
{
    /** @var Order[] */
    public array $orders;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Order($item);
        }

        $this->orders = $array;
    }
}
