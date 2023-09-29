<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class LineItem extends AbstractRequest
{
    public int $quantity;
    public int $price_in_cents;
    public string $tax_code;
    public string $sku;
    public string $description;

    public function __construct(array $payload)
    {
        $this->quantity       = $payload['quantity'];
        $this->price_in_cents = $payload['price_in_cents'];
        $this->tax_code       = $payload['tax_code'];
        $this->sku            = $payload['sku'];
        $this->description    = $payload['description'];

        if ($this->quantity < 1) {
            throw new InvalidArgumentException('Quantity can not be less than 1');
        }
        if ($this->price_in_cents < 0) {
            throw new InvalidArgumentException('Price can not be less than 0');
        }
    }
}
