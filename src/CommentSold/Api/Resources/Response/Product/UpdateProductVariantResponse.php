<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Response;

class UpdateProductVariantResponse extends Variant
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        parent::__construct($payload->data);
    }
}
