<?php

declare(strict_types=1);

namespace Resources\Request\InventoryLevel;

use Exception\InvalidArgumentException;
use Resources\Request\AbstractRequest;

class GetInventoryLevelsRequest extends AbstractRequest
{
    public function __construct(
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
