<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\GlobalClient;

class TaxService extends abstractService
{
    /**
     * Get tax quote for cart
     */
    public function getTaxQuote(array $payload)
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post('quote', $payload);

        return $response->toObject();
    }
}