<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Response;

class CreateProductVariantResponse extends Variant
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        parent::__construct($payload->data);
    }
}