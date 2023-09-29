<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Customer extends AbstractRequest
{
    public function __construct(
        public int $id,
        public bool $tax_exempt,
    ) {
    }
}
