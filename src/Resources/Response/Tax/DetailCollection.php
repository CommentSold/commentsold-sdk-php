<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Tax;

use CommentSold\Resources\AbstractResource;

class DetailCollection extends AbstractResource
{
    /** @var array[Detail] */
    public array $details;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Detail($item);
        }

        $this->details = $array;
    }
}
