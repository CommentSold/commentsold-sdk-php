<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Order;

use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelOrderLineItemRequest extends AbstractRequest
{
    public int $order_id;
    public int $line_item_id;

    public function __construct(array $payload)
    {
        $this->order_id     = $payload['order_id'];
        $this->line_item_id = $payload['line_item_id'];
    }
}
