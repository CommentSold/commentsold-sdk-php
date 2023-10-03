<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Tax;

use CommentSold\Resources\Request\AbstractRequest;

class Customer extends AbstractRequest
{
    public function __construct(
        public int $id,
        public bool $tax_exempt,
    ) {
    }
}
