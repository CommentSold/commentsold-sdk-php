<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class Tag extends AbstractResource
{
    public readonly string $tag;

    public function __construct($tag)
    {
        $this->tag = $tag;
    }
}
