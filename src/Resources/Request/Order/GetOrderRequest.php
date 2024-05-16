<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Order;

use CommentSold\Resources\Request\AbstractRequest;

class GetOrderRequest extends AbstractRequest
{
    public function __construct(public int $order_id)
    {
    }
}
