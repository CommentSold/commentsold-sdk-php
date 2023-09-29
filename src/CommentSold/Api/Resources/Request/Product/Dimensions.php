<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Dimensions extends AbstractRequest
{
    public function __construct(
        public ?int $length,
        public ?int $width,
        public ?int $height,
        public ?int $weight,
    ) {
    }
}
