<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Order;

use CommentSold\Resources\AbstractResource;

class LineItemCollection extends AbstractResource
{
    /** @var array[LineItem] */
    public array $line_items;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new LineItem($item);
        }

        $this->line_items = $array;
    }
}
