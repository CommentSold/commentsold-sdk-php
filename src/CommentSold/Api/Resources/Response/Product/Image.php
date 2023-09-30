<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Image extends AbstractResponse
{
    public int $id;
    public string $url;
    public int $width;
    public int $height;

    public function __construct(object $payload)
    {
        $this->id     = $payload->id;
        $this->url    = $payload->url;
        $this->width  = $payload->width;
        $this->height = $payload->height;
    }
}
