<?php

declare(strict_types=1);

namespace CommentSold\Services;

use CommentSold\Exception\InvalidContextException;
use CommentSold\GlobalClient;
use CommentSold\Resources\Request\Tax\GetTaxQuoteRequest;
use CommentSold\Resources\Response\Tax\GetTaxQuoteResponse;

class TaxApi extends AbstractApi
{
    /**
     * Get tax quote for cart
     */
    public function getTaxQuote(GetTaxQuoteRequest $payload): GetTaxQuoteResponse
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post('quote', $payload);

        return new GetTaxQuoteResponse($response);
    }
}
