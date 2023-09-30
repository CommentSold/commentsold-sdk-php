<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Order;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Payment extends AbstractResponse
{
    public ?string $amount;
    public ?int $subtotal;
    public ?int $shipping;
    public ?int $taxes;
    public int $coupon_discount;
    public ?int $balance_applied;
    public ?int $total;
    public string $payment_ref;
    public string $transaction_id;
    public int $payment_date;

    public function __construct(object $payload)
    {
        $this->amount          = $payload->amount;
        $this->subtotal        = $payload->subtotal;
        $this->shipping        = $payload->shipping;
        $this->taxes           = $payload->taxes;
        $this->coupon_discount = $payload->coupon_discount;
        $this->balance_applied = $payload->balance_applied;
        $this->total           = $payload->total;
        $this->payment_ref     = $payload->payment_ref;
        $this->transaction_id  = $payload->transaction_id;
        $this->payment_date    = $payload->payment_date;
    }
}
