<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Attributes extends AbstractRequest
{
    public ?string $attribute_1 = null;
    public ?string $attribute_2 = null;
    public ?string $attribute_3 = null;

    public function __construct(array $payload)
    {
        $this->attribute_1 = $payload['attribute_1'] ?? null;
        $this->attribute_2 = $payload['attribute_2'] ?? null;
        $this->attribute_3 = $payload['attribute_3'] ?? null;
    }
}
