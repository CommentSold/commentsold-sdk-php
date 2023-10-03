<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\AbstractResource;

class AttributeValues extends AbstractResource
{
    public readonly ?string $attribute_1;
    public readonly ?string $attribute_2;
    public readonly ?string $attribute_3;

    public function __construct(object $payload)
    {
        $this->attribute_1 = $payload->attribute_1;
        $this->attribute_2 = $payload->attribute_2;
        $this->attribute_3 = $payload->attribute_3;
    }
}
