<?php

declare(strict_types=1);

namespace CommentSold\Resources;

abstract class AbstractResource
{
    public function toArray(): array
    {
        return (array) $this;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
