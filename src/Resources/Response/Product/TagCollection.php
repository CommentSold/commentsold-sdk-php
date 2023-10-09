<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class TagCollection extends AbstractResource
{
    /** @var Tag[] */
    public array $tags;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Tag($item);
        }

        $this->tags = $array;
    }
}
