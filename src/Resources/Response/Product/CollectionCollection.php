<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;
use CommentSold\Resources\Response\Product\Collection as ProductCollection;

class CollectionCollection extends AbstractResource
{
    /** @var ProductCollection[] */
    public array $collections;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new ProductCollection($item);
        }

        $this->collections = $array;
    }
}
