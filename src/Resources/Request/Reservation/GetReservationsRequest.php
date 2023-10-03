<?php

declare(strict_types=1);

namespace Resources\Request\Reservation;

use Exception\InvalidArgumentException;
use Resources\Request\AbstractRequest;

class GetReservationsRequest extends AbstractRequest
{
    public function __construct(
        public ?array $filter = null,
        public int $page = 1,
        public int $perPage = self::PER_PAGE,
    ) {
        if ($this->page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($this->perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }
    }
}
