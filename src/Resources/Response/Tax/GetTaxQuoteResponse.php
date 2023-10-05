<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Tax;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Response;

class GetTaxQuoteResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $this->data = new TaxQuote($payload);
    }
}
