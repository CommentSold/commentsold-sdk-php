<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Dropshipping;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class StartDropshipAllocationResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new DropshipAllocation($payload);
    }
}
