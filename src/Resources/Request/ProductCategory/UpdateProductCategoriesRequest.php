<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\ProductCategory;

use CommentSold\Resources\Request\AbstractRequest;

class UpdateProductCategoriesRequest extends AbstractRequest
{
    public function __construct(
        public int $category_id,
        /** @var int[] */
        public array $product_ids,
    ) {
    }
}
