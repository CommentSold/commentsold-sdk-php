<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Reservation;

use CommentSold\Resources\Request\AbstractRequest;

class MetaData extends AbstractRequest
{
    public function __construct(
        public string $experience,
        public string $source,
    ) {
    }
}
