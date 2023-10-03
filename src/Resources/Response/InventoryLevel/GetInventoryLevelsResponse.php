<?php

declare(strict_types=1);

namespace Resources\Response\InventoryLevel;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

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
