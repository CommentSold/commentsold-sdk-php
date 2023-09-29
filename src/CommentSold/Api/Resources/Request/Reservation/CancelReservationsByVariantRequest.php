<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Reservation;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelReservationsByVariantRequest extends AbstractRequest
{
    public int $variant_id;
    public ?int $quantity = 1;

    public function __construct(array $payload)
    {
        $this->variant_id = $payload['variant_id'];
        $this->quantity   = $payload['quantity'];

        if ($this->quantity < 1) {
            throw new InvalidArgumentException('Quantity can not be less than 1');
        }
    }
}
