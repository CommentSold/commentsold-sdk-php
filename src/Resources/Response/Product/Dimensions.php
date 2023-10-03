<?php

declare(strict_types=1);

namespace Resources\Response\Product;

use Resources\AbstractResource;

class Dimensions extends AbstractResource
{
    public readonly ?int $length;
    public readonly ?int $width;
    public readonly ?int $height;
    public readonly ?int $weight;

    public function __construct(object $payload)
    {
        $this->length = $payload->length;
        $this->width  = $payload->width;
        $this->height = $payload->height;
        $this->weight = $payload->weight;
    }
}
