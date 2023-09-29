<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Dimensions extends AbstractRequest
{
    public ?int $length;
    public ?int $width;
    public ?int $height;
    public ?int $weight;

    public function __construct(array $payload)
    {
        $this->length = $payload['length'];
        $this->width  = $payload['width'];
        $this->height = $payload['height'];
        $this->weight = $payload['weight'];
    }
}
