<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Reservation;

use CommentSold\Api\Resources\Request\AbstractRequest;

class ReserveProductVariantRequest extends AbstractRequest
{
    public int $variant_id;
    public ?int $customer_id = null;
    public ?string $external_customer_id = null;
    public int $quantity;
    public ?bool $do_not_hold = null;
    public ?Meta $meta;

    public function __construct(array $payload)
    {
        $this->variant_id           = $payload['variant_id'];
        $this->customer_id          = $payload['customer_id'] ?? null;
        $this->external_customer_id = $payload['external_customer_id'] ?? null;
        $this->quantity             = $payload['quantity'];
        $this->do_not_hold          = $payload['do_not_hold'] ?? null;
        $this->meta                 = isset($payload['meta']) ? new Meta($payload['meta']) : null;
    }
}
