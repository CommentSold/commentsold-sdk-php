<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class ProductDropshipDetails extends AbstractResponse
{
    public ?int $partner_id;
    public ?string $partner_name;
    public ?int $supplier_id;
    public ?string $supplier_name;

    public function __construct(object $payload)
    {
        $this->partner_id    = $payload->partner_id;
        $this->partner_name  = $payload->partner_name;
        $this->supplier_id   = $payload->supplier_id;
        $this->supplier_name = $payload->supplier_name;
    }
}
