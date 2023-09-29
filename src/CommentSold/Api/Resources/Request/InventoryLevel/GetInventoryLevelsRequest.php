<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\InventoryLevel;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;
use CommentSold\Api\Services\AbstractService;

class GetInventoryLevelsRequest extends AbstractRequest
{
    public int $page = 1;
    public int $perPage = AbstractService::PER_PAGE;

    public function __construct(array $payload)
    {
        $this->page    = $payload['page'];
        $this->perPage = $payload['perPage'];

        if ($this->page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($this->perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }
    }
}
