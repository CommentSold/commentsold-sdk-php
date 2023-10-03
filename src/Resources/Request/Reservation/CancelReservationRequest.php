<?php

declare(strict_types=1);

namespace Resources\Request\Reservation;

use Resources\Request\AbstractRequest;

class CancelReservationRequest extends AbstractRequest
{
    public function __construct(public int $reservation_id)
    {
    }
}
