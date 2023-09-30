<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class VariantDropshipDetails extends AbstractResponse
{
    public int $unit_cost;
    public int $partner_commission;
    public int $minimum_configurable_retail_price;
    public int $maximum_configurable_retail_price;

    public function __construct(object $payload)
    {
        $this->unit_cost                         = $payload->unit_cost;
        $this->partner_commission                = $payload->partner_commission;
        $this->minimum_configurable_retail_price = $payload->minimum_configurable_retail_price;
        $this->maximum_configurable_retail_price = $payload->maximum_configurable_retail_price;
    }
}
