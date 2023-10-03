<?php

declare(strict_types=1);

namespace Resources\Request\Tax;

use Resources\Request\AbstractRequest;

class Customer extends AbstractRequest
{
    public function __construct(
        public int $id,
        public bool $tax_exempt,
    ) {
    }
}
