<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Tax;

use CommentSold\Resources\AbstractResource;

class Detail extends AbstractResource
{
    public readonly string $tax_name;
    public readonly int $amount;
    public readonly int $rate;
    public readonly bool $flat_rate;

    public function __construct(object $payload)
    {
        $this->tax_name  = $payload->tax_name;
        $this->amount    = $payload->amount;
        $this->rate      = $payload->rate;
        $this->flat_rate = $payload->flat_rate;
    }
}
