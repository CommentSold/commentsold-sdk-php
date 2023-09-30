<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Fulfillment;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Response;

class AddTrackingResponse extends AbstractResponse
{
    public string $id;

    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->id = $payload->id;
    }
}
