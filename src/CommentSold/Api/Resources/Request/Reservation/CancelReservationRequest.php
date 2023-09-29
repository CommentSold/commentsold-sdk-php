<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Reservation;

use CommentSold\Api\Resources\Request\AbstractRequest;

class CancelReservationRequest extends AbstractRequest
{
    public int $reservation_id;

    public function __construct(int $reservation_id)
    {
        $this->reservation_id = $reservation_id;
    }
}
