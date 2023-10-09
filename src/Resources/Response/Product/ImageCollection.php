<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class ImageCollection extends AbstractResource
{
    /** @var Image[] */
    public array $images;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Image($item);
        }

        $this->images = $array;
    }
}
