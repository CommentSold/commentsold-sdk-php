<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\InventoryLevel;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Resources\Response\Pagination;
use CommentSold\Response;

class GetInventoryLevelsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $inventoryLevels = [];
        foreach ($payload->data ?? [] as $inventoryLevel) {
            $inventoryLevels[] = new InventoryLevel($inventoryLevel);
        }

        $this->data       = $inventoryLevels;
        $this->pagination = new Pagination($payload->pagination);
    }
}
