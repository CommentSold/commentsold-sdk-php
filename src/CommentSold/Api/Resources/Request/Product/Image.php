<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Image extends AbstractRequest
{
    public string $url;
    public ?string $width = null;
    public ?string $height = null;

    public function __construct(array $payload)
    {
        $this->url    = $payload['url'];
        $this->width  = $payload['width'] ?? null;
        $this->height = $payload['height'] ?? null;
    }
}
