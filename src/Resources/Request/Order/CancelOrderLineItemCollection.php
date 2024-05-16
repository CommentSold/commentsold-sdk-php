<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Order;

use CommentSold\Resources\Request\AbstractRequest;

class CancelOrderLineItemCollection extends AbstractRequest
{
    public function __construct(
        /** @var CancelOrderLineItem[] */
        public array $line_items
    ) {
    }
}
