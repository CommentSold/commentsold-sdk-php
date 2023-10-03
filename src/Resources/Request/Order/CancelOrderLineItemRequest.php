<?php

declare(strict_types=1);

namespace Resources\Request\Order;

use Resources\Request\AbstractRequest;

class CancelOrderLineItemRequest extends AbstractRequest
{
    public function __construct(
        public int $order_id,
        public int $line_item_id,
    ) {
    }
}
