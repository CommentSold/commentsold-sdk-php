<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Order;

use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelOrderRequest extends AbstractRequest
{
    public int $order_id;

    public function __construct(int $order_id)
    {
        $this->order_id = $order_id;
    }
}
