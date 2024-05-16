<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class Collection extends AbstractResource
{
    public readonly int $id;
    public readonly int $title;

    public function __construct(object $payload)
    {
        $this->id    = $payload->id;
        $this->title = $payload->title;
    }
}
