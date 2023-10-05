<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Reservation;

use CommentSold\Resources\AbstractResource;

class ReservationIdCollection extends AbstractResource
{
    /** @var array[ReservationId] */
    public array $reservation_ids;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new ReservationId($item);
        }

        $this->reservation_ids = $array;
    }
}
