<?php

declare(strict_types=1);

namespace Resources\Request\Dropshipping;

use Resources\Request\AbstractRequest;

class StartDropshippingAllocationRequest extends AbstractRequest
{
    /** @var array[int] */
    public function __construct(public array $product_ids)
    {
    }
}
