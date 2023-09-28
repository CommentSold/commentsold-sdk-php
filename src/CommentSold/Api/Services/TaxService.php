<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidContextException;

class TaxService extends abstractService
{
    /**
     * Get tax quote for cart
     */
    public function getTaxQuote(array $payload)
    {
        if ($this->client->getContext() != Context::Global) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post('quote', $payload);

        return $response->toObject();
    }
}
