<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class ProductCollection extends AbstractResource
{
    /** @var array[Product] */
    public array $products;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Product($item);
        }

        $this->products = $array;
    }
}
