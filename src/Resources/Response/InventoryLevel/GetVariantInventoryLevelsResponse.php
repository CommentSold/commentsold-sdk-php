<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\InventoryLevel;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class GetVariantInventoryLevelsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new InventoryLevel($payload->data);
    }
}
