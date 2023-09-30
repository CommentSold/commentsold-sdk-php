<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Tax;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Detail extends AbstractResponse
{
    public string $tax_name;
    public int $amount;
    public int $rate;
    public bool $flat_rate;

    public function __construct(object $payload)
    {
        $this->tax_name  = $payload->tax_name;
        $this->amount    = $payload->amount;
        $this->rate      = $payload->rate;
        $this->flat_rate = $payload->flat_rate;
    }
}
