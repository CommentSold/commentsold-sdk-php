<?php

declare(strict_types=1);

namespace Resources\Request\Product;

use Resources\Request\AbstractRequest;

class Image extends AbstractRequest
{
    public function __construct(
        public string $url,
        public ?string $width = null,
        public ?string $height = null,
    ) {
    }
}
