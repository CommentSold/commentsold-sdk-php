<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Reservation;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class CancelReservesByProductVariantResponse extends AbstractResponse
{
    /** @var array[int] */
    public array $canceled_reservation_ids;

    public function __construct(Response $response)
    {
        $this->canceled_reservation_ids = $response->toArray();
    }
}
