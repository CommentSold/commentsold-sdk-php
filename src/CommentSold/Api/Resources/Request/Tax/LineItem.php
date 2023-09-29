<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class LineItem extends AbstractRequest
{
    public function __construct(
        public int $quantity,
        public int $price_in_cents,
        public string $tax_code,
        public string $sku,
        public string $description,
    ) {
        if ($this->quantity < 1) {
            throw new InvalidArgumentException('Quantity can not be less than 1');
        }
        if ($this->price_in_cents < 0) {
            throw new InvalidArgumentException('Price can not be less than 0');
        }
    }
}
