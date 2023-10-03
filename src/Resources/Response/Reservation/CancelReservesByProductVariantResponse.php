<?php

declare(strict_types=1);

namespace Resources\Response\Reservation;

use Resources\Response\AbstractResponse;
use Response;

class CancelReservesByProductVariantResponse extends AbstractResponse
{
    /** @var array[int] */
    public array $canceled_reservation_ids;

    public function __construct(Response $response)
    {
        $this->data = [
            'canceled_reservation_ids' => $response->toArray(),
        ];
    }
}
