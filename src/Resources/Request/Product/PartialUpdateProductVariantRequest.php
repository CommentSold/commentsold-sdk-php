<?php

declare(strict_types=1);

namespace Resources\Request\Product;

use Exception\InvalidArgumentException;
use Resources\Request\AbstractRequest;

class PartialUpdateProductVariantRequest extends AbstractRequest
{
    public function __construct(
        public int $product_id,
        public int $variant_id,
        public ?string $name = null,
        public ?int $price_in_cents = null,
        public ?int $original_price_in_cents = null,
        public ?int $cost_in_cents = null,
        public ?string $sku = null,
        public ?string $barcode = null,
        public ?Dimensions $dimensions = null,
        public ?bool $is_archived = null,
        public ?AttributeValues $attributes = null,
        public ?int $shopify_id = null,
        public ?int $shopify_inventory_item_id = null,
    ) {
        if ($this->price_in_cents < 0) {
            throw new InvalidArgumentException('Price can not be less than 0');
        }
        if ($this->original_price_in_cents < 0) {
            throw new InvalidArgumentException('Original price can not be less than 0');
        }
        if ($this->cost_in_cents < 0) {
            throw new InvalidArgumentException('Cost can not be less than 0');
        }
    }
}
