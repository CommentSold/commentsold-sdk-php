<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Reservation;

use CommentSold\Resources\AbstractResource;

class ReservationCollection extends AbstractResource
{
    /** @var Reservation[] */
    public array $reservations;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Reservation($item);
        }

        $this->reservations = $array;
    }
}
