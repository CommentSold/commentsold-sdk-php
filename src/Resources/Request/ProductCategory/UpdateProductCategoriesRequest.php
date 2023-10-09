<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\ProductCategory;

use CommentSold\Resources\Request\AbstractRequest;

class UpdateProductCategoriesRequest extends AbstractRequest
{
    /**
     * @param  int[]  $product_ids
     */
    public function __construct(
        public int $category_id,
        public array $product_ids,
    ) {
    }
}
