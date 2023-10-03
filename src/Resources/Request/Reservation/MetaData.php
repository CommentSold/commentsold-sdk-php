<?php

declare(strict_types=1);

namespace Resources\Request\Reservation;

use Resources\Request\AbstractRequest;

class MetaData extends AbstractRequest
{
    public function __construct(
        public string $experience,
        public string $source,
    ) {
    }
}
