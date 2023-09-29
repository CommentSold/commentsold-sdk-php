<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Reservation;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelReservationsByVariantRequest extends AbstractRequest
{
    public function __construct(
        public int $variant_id,
        public ?int $quantity = 1,
    ) {
        if ($this->quantity < 1) {
            throw new InvalidArgumentException('Quantity can not be less than 1');
        }
    }
}
