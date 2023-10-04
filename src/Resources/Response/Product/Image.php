<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class Image extends AbstractResource
{
    public readonly int $id;
    public readonly string $url;
    public readonly ?int $width;
    public readonly ?int $height;

    public function __construct(object $payload)
    {
        $this->id     = $payload->id;
        $this->url    = $payload->url;
        $this->width  = $payload->width;
        $this->height = $payload->height;
    }
}
