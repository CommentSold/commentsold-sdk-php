<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\InventoryLevel;

use CommentSold\Api\Response;

class GetVariantInventoryLevelsResponse extends InventoryLevel
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        parent::__construct($payload->data);
    }
}
