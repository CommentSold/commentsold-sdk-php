<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Fulfillment;

use CommentSold\Resources\AbstractResource;

class Tracking extends AbstractResource
{
    public readonly int $id;

    public function __construct(object $payload)
    {
        $this->id = $payload->id;
    }
}
