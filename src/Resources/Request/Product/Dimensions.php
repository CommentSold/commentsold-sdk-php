<?php

declare(strict_types=1);

namespace Resources\Request\Product;

use Resources\Request\AbstractRequest;

class Dimensions extends AbstractRequest
{
    public function __construct(
        public ?int $length,
        public ?int $width,
        public ?int $height,
        public ?int $weight,
    ) {
    }
}
