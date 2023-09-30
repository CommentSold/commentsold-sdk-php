<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Dimensions extends AbstractResponse
{
    public ?int $length;
    public ?int $width;
    public ?int $height;
    public ?int $weight;

    public function __construct(object $payload)
    {
        $this->length = $payload->length;
        $this->width  = $payload->width;
        $this->height = $payload->height;
        $this->weight = $payload->weight;
    }
}
