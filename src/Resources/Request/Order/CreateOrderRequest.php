<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Order;

use CommentSold\Enums\CustomerOrderSequence;
use CommentSold\Exception\InvalidArgumentException;
use CommentSold\Resources\Request\AbstractRequest;

class CreateOrderRequest extends AbstractRequest
{
    /**
     * @param  int[]  $reservation_ids
     * @param  int[]|null  $custom_reservation_prices
     *
     * @throws InvalidArgumentException
     */
    public function __construct(
        public array $reservation_ids,
        public int $amount_paid,
        public int $subtotal,
        public int $tax_total,
        public int $shipping_total,
        public int $discount,
        public ShippingAddress $shipping_address,
        public ?int $coupon_code = null,
        public ?bool $update_customer_info = null,
        public ?array $custom_reservation_prices = null,
        public ?bool $local_pickup = null,
        public ?string $external_order_service = null,
        public ?string $external_order_id = null,
        public ?string $external_order_url = null,
        public ?string $order_sequence = null,
        public ?string $order_note = null,
        public ?bool $is_tiktok_order = null,
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
        if ($this->order_sequence && ! in_array($this->order_sequence, array_column(CustomerOrderSequence::cases(), 'value'))) {
            throw new InvalidArgumentException('Order sequence must be one of '.implode(', ', array_column(CustomerOrderSequence::cases(), 'value')));
        }
        if ($this->external_order_service && ! $this->external_order_id) {
            throw new InvalidArgumentException('External order ID is required with external order source');
        }
        if ($this->external_order_id && ! $this->external_order_service) {
            throw new InvalidArgumentException('External order source is required with external order ID');
        }
    }
}
