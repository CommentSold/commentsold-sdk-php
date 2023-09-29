<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class Shipping extends AbstractRequest
{
    public bool $local_pickup;
    public int $cost_in_cents;
    public ?string $tax_code = null;

    public function __construct(array $payload)
    {
        $this->local_pickup  = $payload['local_pickup'];
        $this->cost_in_cents = $payload['cost_in_cents'];
        $this->tax_code      = $payload['tax_code'] ?? null;

        if ($this->cost_in_cents < 0) {
            throw new InvalidArgumentException('Cost must be more than 0');
        }
    }
}
