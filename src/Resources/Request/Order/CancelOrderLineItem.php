<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Order;

use CommentSold\Resources\Request\AbstractRequest;

class CancelOrderLineItem extends AbstractRequest
{
    public function __construct(
        public int $line_item_id,
        public bool $back_to_inventory,
        public ?string $note,
    ) {
    }
}
