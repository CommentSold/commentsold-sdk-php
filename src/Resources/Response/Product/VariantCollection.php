<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class VariantCollection extends AbstractResource
{
    /** @var array[Variant] */
    public array $variants;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Variant($item);
        }

        $this->variants = $array;
    }
}
