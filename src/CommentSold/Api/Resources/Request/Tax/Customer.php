<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Customer extends AbstractRequest
{
    public int $id;
    public bool $tax_exempt;

    public function __construct(array $payload)
    {
        $this->id         = $payload['id'];
        $this->tax_exempt = $payload['tax_exempt'];
    }
}
