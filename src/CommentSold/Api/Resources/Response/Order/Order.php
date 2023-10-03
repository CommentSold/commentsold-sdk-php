<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\AbstractResource;

class Order extends AbstractResource
{
    public readonly int $id;
    public readonly int $customer_id;
    public readonly string $status;
    public readonly ShippingAddress $shipping_address;
    public readonly Payment $payment;
    public readonly Fulfillment $fulfillment;
    /** @var array[LineItem] */
    public readonly array $line_items;
    public readonly int $created_at;
    public readonly int $updated_at;

    public function __construct(object $payload)
    {
        $lineItems = [];
        foreach ($payload->line_items ?? [] as $lineItem) {
            $lineItems[] = new LineItem($lineItem);
        }

        $this->id               = $payload->id;
        $this->customer_id      = $payload->customer_id;
        $this->status           = $payload->status;
        $this->shipping_address = new ShippingAddress($payload->shipping_address);
        $this->payment          = new Payment($payload->payment);
        $this->fulfillment      = new Fulfillment($payload->fulfillment);
        $this->line_items       = $lineItems;
        $this->created_at       = $payload->created_at;
        $this->updated_at       = $payload->updated_at;
    }
}
