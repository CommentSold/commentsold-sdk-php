<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class ProductDropshipDetails extends AbstractResource
{
    public readonly ?int $partner_id;
    public readonly ?string $partner_name;
    public readonly ?int $supplier_id;
    public readonly ?string $supplier_name;

    public function __construct(object $payload)
    {
        $this->partner_id    = $payload->partner_id;
        $this->partner_name  = $payload->partner_name;
        $this->supplier_id   = $payload->supplier_id;
        $this->supplier_name = $payload->supplier_name;
    }
}
