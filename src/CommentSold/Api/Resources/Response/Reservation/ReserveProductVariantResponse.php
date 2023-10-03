<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Reservation;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class ReserveProductVariantResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $this->data = [
            'reservation_ids' => $response->toArray(),
        ];
    }
}
