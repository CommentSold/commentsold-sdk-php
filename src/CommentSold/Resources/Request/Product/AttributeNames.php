<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Product;

use CommentSold\Resources\Request\AbstractRequest;

class AttributeNames extends AbstractRequest
{
    public function __construct(
        public ?string $attribute_1 = null,
        public ?string $attribute_2 = null,
        public ?string $attribute_3 = null,
    ) {
    }
}
