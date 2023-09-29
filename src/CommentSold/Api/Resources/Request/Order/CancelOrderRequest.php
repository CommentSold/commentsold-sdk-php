<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Order;

use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelOrderRequest extends AbstractRequest
{
    public function __construct(public int $order_id)
    {
    }
}
