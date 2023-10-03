<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\InventoryLevel;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class GetVariantInventoryLevelsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new InventoryLevel($payload->data);
    }
}
