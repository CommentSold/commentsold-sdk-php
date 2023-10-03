<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Tax;

use CommentSold\Api\Resources\AbstractResource;

class LineItem extends AbstractResource
{
    public readonly string $sku;
    public readonly int $tax_amount;
    public readonly int $taxable_amount;
    /** @var array[Detail] */
    public readonly array $details;

    public function __construct(object $payload)
    {
        $details = [];
        foreach ($payload->details ?? [] as $detail) {
            $details[] = new Detail($detail);
        }

        $this->sku            = $payload->sku;
        $this->tax_amount     = $payload->tax_amount;
        $this->taxable_amount = $payload->taxable_amount;
        $this->details        = $details;
    }
}
