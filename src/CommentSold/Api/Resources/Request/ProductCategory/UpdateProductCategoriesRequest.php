<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\ProductCategory;

use CommentSold\Api\Resources\Request\AbstractRequest;

class UpdateProductCategoriesRequest extends AbstractRequest
{
    public int $category_id;
    /** @var array[int] */
    public array $product_ids;

    public function __construct(array $payload)
    {
        $this->category_id = $payload['category_id'];
        $this->product_ids = $payload['product_ids'];
    }
}
