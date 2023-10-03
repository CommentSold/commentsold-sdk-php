<?php

declare(strict_types=1);

namespace Resources\Response\Order;

use Resources\AbstractResource;

class Payment extends AbstractResource
{
    public readonly ?string $amount;
    public readonly ?int $subtotal;
    public readonly ?int $shipping;
    public readonly ?int $taxes;
    public readonly int $coupon_discount;
    public readonly ?int $balance_applied;
    public readonly ?int $total;
    public readonly string $payment_ref;
    public readonly string $transaction_id;
    public readonly int $payment_date;

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
