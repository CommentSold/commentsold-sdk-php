<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Dropshipping;

use CommentSold\Resources\AbstractResource;

class DropshipAllocation extends AbstractResource
{
    /** @var int[] */
    public readonly array $successfully_allocated_products;
    /** @var int[] */
    public readonly array $unsuccessfully_allocated_products;

    public function __construct(object $payload)
    {
        $this->successfully_allocated_products   = $payload->data->successfully_allocated_products;
        $this->unsuccessfully_allocated_products = $payload->data->unsuccessfully_allocated_products;
    }
}
