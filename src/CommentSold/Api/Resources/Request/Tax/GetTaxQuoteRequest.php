<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Tax;

use CommentSold\Api\Resources\Request\AbstractRequest;

class GetTaxQuoteRequest extends AbstractRequest
{
    public Authorization $authorization;
    public FromAddress $from_address;
    public Shipping $shipping;
    public ToAddress $to_address;
    public Customer $customer;

    /** @var array[LineItem] */
    public array $line_items;
    public int $discount_total;

    public function __construct(array $payload)
    {
        $lineItems = [];
        foreach ($payload['line_items'] as $lineItem) {
            $lineItems[] = new LineItem($lineItem);
        }

        $this->authorization  = new Authorization($payload['authorization']);
        $this->from_address   = new FromAddress($payload['from_address']);
        $this->shipping       = new Shipping($payload['shipping']);
        $this->to_address     = new ToAddress($payload['to_address']);
        $this->customer       = new Customer($payload['customer']);
        $this->line_items     = $lineItems;
        $this->discount_total = $payload['discount_total'];
    }
}
