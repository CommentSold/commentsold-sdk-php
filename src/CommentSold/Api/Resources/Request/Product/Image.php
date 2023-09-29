<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Image extends AbstractRequest
{
    public function __construct(
        public string $url,
        public ?string $width = null,
        public ?string $height = null,
    ) {
    }
}
