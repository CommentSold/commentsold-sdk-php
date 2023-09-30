<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Category extends AbstractResponse
{
    public int $id;
    public string $title;
    public string $full_path;

    public function __construct(object $payload)
    {
        $this->id        = $payload->id;
        $this->title     = $payload->title;
        $this->full_path = $payload->full_path;
    }
}
