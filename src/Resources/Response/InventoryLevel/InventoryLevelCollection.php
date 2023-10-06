<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\InventoryLevel;

use CommentSold\Resources\AbstractResource;

class InventoryLevelCollection extends AbstractResource
{
    /** @var InventoryLevel[] */
    public array $inventory_levels;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new InventoryLevel($item);
        }

        $this->inventory_levels = $array;
    }
}
