<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Reservation;

use CommentSold\Resources\Request\AbstractRequest;

class CancelReservationRequest extends AbstractRequest
{
    public function __construct(public int $reservation_id)
    {
    }
}
