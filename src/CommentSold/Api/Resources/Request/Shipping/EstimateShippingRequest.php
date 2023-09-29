<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Shipping;

use CommentSold\Api\Resources\Request\AbstractRequest;

class EstimateShippingRequest extends AbstractRequest
{
    /** @var array[int] */
    public array $variant_ids;
    public ?string $shipping_method = null;

    public function __construct(array $payload)
    {
        $this->variant_ids     = $payload['variant_ids'];
        $this->shipping_method = $payload['shipping_method'] ?? null;
    }
}
