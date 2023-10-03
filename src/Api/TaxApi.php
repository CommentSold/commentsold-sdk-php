<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use GlobalClient;
use Resources\Request\Tax\GetTaxQuoteRequest;
use Resources\Response\Tax\GetTaxQuoteResponse;

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
