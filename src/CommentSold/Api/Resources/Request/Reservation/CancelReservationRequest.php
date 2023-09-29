<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Reservation;

use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelReservationRequest extends AbstractRequest
{
    public function __construct(public int $reservation_id)
    {
    }
}
