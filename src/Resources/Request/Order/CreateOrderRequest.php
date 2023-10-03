<?php

declare(strict_types=1);

namespace Resources\Request\Order;

use Exception\InvalidArgumentException;
use Resources\Request\AbstractRequest;

class CreateOrderRequest extends AbstractRequest
{
    /** @var array[int] */
    public function __construct(
        public array $reservation_ids,
        public int $amount_paid,
        public int $subtotal,
        public int $tax_total,
        public int $shipping_total,
        public int $discount,
        public ShippingAddress $shipping_address,
        public ?bool $update_customer_info = null,
        public ?array $custom_reservation_prices = null,
    ) {
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
