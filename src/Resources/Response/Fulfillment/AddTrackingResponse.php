<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Fulfillment;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class AddTrackingResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = [
            'id' => $payload->id,
        ];
    }
}
