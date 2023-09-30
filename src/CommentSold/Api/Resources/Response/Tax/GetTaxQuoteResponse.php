<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Tax;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class GetTaxQuoteResponse extends AbstractResponse
{
    public int $tax_total;
    public int $taxable_amount;
    public string $source;
    /** @var array[Detail] */
    public array $details;
    /** @var array[LineItem] */
    public array $lines;

    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $details = [];
        foreach ($payload->details ?? [] as $detail) {
            $details[] = new Detail($detail);
        }

        $lineItems = [];
        foreach ($payload->lines ?? [] as $lineItem) {
            $lineItems[] = new LineItem($lineItem);
        }

        $this->tax_total      = $payload->tax_total;
        $this->taxable_amount = $payload->taxable_amount;
        $this->source         = $payload->source;
        $this->details        = $details;
        $this->lines          = $lineItems;
    }
}
