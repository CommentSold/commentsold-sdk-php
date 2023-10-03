<?php

declare(strict_types=1);

namespace Resources\Response\Reservation;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

class GetReservationsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $reservations = [];
        foreach ($payload->data ?? [] as $reservation) {
            $reservations[] = new Reservation($reservation);
        }

        $this->data       = $reservations;
        $this->pagination = new Pagination($payload->pagination);
    }
}
