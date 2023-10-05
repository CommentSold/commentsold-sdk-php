<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Reservation;

use CommentSold\Resources\AbstractResource;

class ReservationId extends AbstractResource
{
    public readonly int $reservation_id;

    public function __construct($id)
    {
        $this->reservation_id = $id;
    }
}
