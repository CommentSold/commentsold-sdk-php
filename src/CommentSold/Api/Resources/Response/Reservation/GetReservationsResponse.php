<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Reservation;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Resources\Response\Pagination;
use CommentSold\Api\Response;

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
