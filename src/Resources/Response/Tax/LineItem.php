<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Tax;

use CommentSold\Resources\AbstractResource;

class LineItem extends AbstractResource
{
    public readonly string $sku;
    public readonly int $tax_amount;
    public readonly int $taxable_amount;
    public readonly DetailCollection $details;

    public function __construct(object $payload)
    {
        $this->sku            = $payload->sku;
        $this->tax_amount     = $payload->tax_amount;
        $this->taxable_amount = $payload->taxable_amount;
        $this->details        = new DetailCollection($payload->details);
    }
}
