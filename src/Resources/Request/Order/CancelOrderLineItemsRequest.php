<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Order;

use CommentSold\Resources\Request\AbstractRequest;

class CancelOrderLineItemsRequest extends AbstractRequest
{
    public function __construct(
        public int $order_id,
        public CancelOrderLineItemCollection $line_items,
    ) {
    }
}
