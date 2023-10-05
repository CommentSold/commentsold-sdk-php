<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Reservation;

use CommentSold\Resources\AbstractResource;

class CanceledReservationIdCollection extends AbstractResource
{
    /** @var array[ReservationId] */
    public array $canceled_reservation_ids;

    public function __construct(?array $payload = [])
    {
        $reservations = [];
        foreach ($payload as $item) {
            $reservations[] = new ReservationId($item);
        }

        $this->canceled_reservation_ids = $reservations;
    }
}
