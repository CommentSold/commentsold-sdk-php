<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Tax;

use CommentSold\Resources\AbstractResource;

class LineItemCollection extends AbstractResource
{
    /** @var LineItem[] */
    public array $lines;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new LineItem($item);
        }

        $this->lines = $array;
    }
}
