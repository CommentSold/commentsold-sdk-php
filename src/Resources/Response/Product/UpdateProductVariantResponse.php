<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class UpdateProductVariantResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new Variant($payload->data);
    }
}
