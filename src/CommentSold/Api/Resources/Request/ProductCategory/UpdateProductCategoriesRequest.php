<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\ProductCategory;

use CommentSold\Api\Resources\Request\AbstractRequest;

class UpdateProductCategoriesRequest extends AbstractRequest
{
    /** @var array[int] */
    public function __construct(
        public int $category_id,
        public array $product_ids,
    ) {
    }
}
