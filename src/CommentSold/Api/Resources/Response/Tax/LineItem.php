<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Tax;

use CommentSold\Api\Resources\Response\AbstractResponse;

class LineItem extends AbstractResponse
{
    public string $sku;
    public int $tax_amount;
    public int $taxable_amount;
    /** @var array[Detail] */
    public array $details;

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
