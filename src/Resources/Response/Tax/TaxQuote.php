<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Tax;

use CommentSold\Resources\AbstractResource;

class TaxQuote extends AbstractResource
{
    public int $tax_total;
    public int $taxable_amount;
    public string $source;
    public DetailCollection $details;
    public LineItemCollection $lines;

    public function __construct(object $payload)
    {
        $this->tax_total      = $payload->tax_total;
        $this->taxable_amount = $payload->taxable_amount;
        $this->source         = $payload->source;
        $this->details        = new DetailCollection($payload->details);
        $this->lines          = new LineItemCollection($payload->lines);
    }
}
