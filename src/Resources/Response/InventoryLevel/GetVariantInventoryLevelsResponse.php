<?php

declare(strict_types=1);

namespace Resources\Response\InventoryLevel;

use Resources\Response\AbstractResponse;
use Response;

class GetVariantInventoryLevelsResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new InventoryLevel($payload->data);
    }
}
