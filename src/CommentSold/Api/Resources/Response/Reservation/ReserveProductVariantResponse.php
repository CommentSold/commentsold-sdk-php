<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Reservation;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class ReserveProductVariantResponse extends AbstractResponse
{
    /** @var array[int] */
    public array $reservation_ids;

    public function __construct(Response $response)
    {
        $this->reservation_ids = $response->toArray();
    }
}
