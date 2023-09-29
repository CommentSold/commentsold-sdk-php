<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Order;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class CreateOrderRequest extends AbstractRequest
{
    /** @var array[int] */
    public array $reservation_ids;

    public int $amount_paid;
    public int $subtotal;
    public int $tax_total;
    public int $shipping_total;
    public int $discount;
    public ShippingAddress $shipping_address;
    public ?bool $update_customer_info = null;
    public ?array $custom_reservation_prices = null;

    public function __construct(array $payload)
    {
        $this->reservation_ids           = $payload['reservation_ids'];
        $this->amount_paid               = $payload['amount_paid'];
        $this->subtotal                  = $payload['subtotal'];
        $this->tax_total                 = $payload['tax_total'];
        $this->shipping_total            = $payload['shipping_total'];
        $this->discount                  = $payload['discount'];
        $this->shipping_address          = $payload['shipping_address'];
        $this->update_customer_info      = $payload['update_customer_info'] ?? null;
        $this->custom_reservation_prices = $payload['custom_reservation_prices'] ?? null;

        if ($this->amount_paid < 0) {
            throw new InvalidArgumentException('Amount paid can not be less than 0');
        }
        if ($this->subtotal < 0) {
            throw new InvalidArgumentException('Subtotal can not be less than 0');
        }
        if ($this->tax_total < 0) {
            throw new InvalidArgumentException('Tax can not be less than 0');
        }
        if ($this->shipping_total < 0) {
            throw new InvalidArgumentException('Shipping can not be less than 0');
        }
        if ($this->discount < 0) {
            throw new InvalidArgumentException('Discount can not be less than 0');
        }
    }
}
