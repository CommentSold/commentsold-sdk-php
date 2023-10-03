<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Reservation;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

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
