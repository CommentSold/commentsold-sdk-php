<?php

declare(strict_types=1);

namespace Resources\Request\Tax;

use Exception\InvalidArgumentException;
use Resources\Request\AbstractRequest;

class Shipping extends AbstractRequest
{
    public function __construct(
        public bool $local_pickup,
        public int $cost_in_cents,
        public ?string $tax_code = null,
    ) {
        if ($this->cost_in_cents < 0) {
            throw new InvalidArgumentException('Cost must be more than 0');
        }
    }
}
