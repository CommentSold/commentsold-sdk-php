<?php

declare(strict_types=1);

namespace Resources\Request\Product;

use Resources\Request\AbstractRequest;

class AttributeValues extends AbstractRequest
{
    public function __construct(
        public ?string $attribute_1 = null,
        public ?string $attribute_2 = null,
        public ?string $attribute_3 = null,
    ) {
    }
}
