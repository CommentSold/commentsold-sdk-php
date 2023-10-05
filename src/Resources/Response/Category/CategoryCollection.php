<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Category;

use CommentSold\Resources\AbstractResource;

class CategoryCollection extends AbstractResource
{
    /** @var array[Category] */
    public array $categories;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Category($item);
        }

        $this->categories = $array;
    }
}
