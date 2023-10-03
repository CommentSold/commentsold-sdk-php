<?php

declare(strict_types=1);

namespace Resources\Response\Reservation;

use Resources\Response\AbstractResponse;
use Response;

class ReserveProductVariantResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $this->data = [
            'reservation_ids' => $response->toArray(),
        ];
    }
}
