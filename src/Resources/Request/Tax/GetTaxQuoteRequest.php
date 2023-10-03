<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Tax;

use CommentSold\Resources\Request\AbstractRequest;

class GetTaxQuoteRequest extends AbstractRequest
{
    /** @var array[LineItem] */
    public function __construct(
        public Authorization $authorization,
        public FromAddress $from_address,
        public Shipping $shipping,
        public ToAddress $to_address,
        public Customer $customer,
        public array $line_items,
        public int $discount_total,
    ) {
    }
}
