<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Category;

use CommentSold\Api\Resources\AbstractResource;

class Category extends AbstractResource
{
    public readonly int $id;
    public readonly string $title;
    public readonly string $full_path;

    public function __construct(object $payload)
    {
        $this->id        = $payload->id;
        $this->total     = $payload->total;
        $this->full_path = $payload->full_path;
    }
}
