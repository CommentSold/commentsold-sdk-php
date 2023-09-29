<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Reservation;

use CommentSold\Api\Resources\Request\AbstractRequest;

class Meta extends AbstractRequest
{
    public string $experience;
    public string $source;

    public function __construct(array $payload)
    {
        $this->experience = $payload['experience'];
        $this->source     = $payload['source'];
    }
}
