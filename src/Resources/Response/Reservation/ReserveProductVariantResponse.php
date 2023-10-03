<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Reservation;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class ReserveProductVariantResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $this->data = [
            'reservation_ids' => $response->toArray(),
        ];
    }
}
