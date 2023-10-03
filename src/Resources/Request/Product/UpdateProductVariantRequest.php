<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Product;

use CommentSold\Exception\InvalidArgumentException;
use CommentSold\Resources\Request\AbstractRequest;

class UpdateProductVariantRequest extends AbstractRequest
{
    public function __construct(
        public int $product_id,
        public int $variant_id,
        public string $name,
        public int $price_in_cents,
        public int $cost_in_cents,
        public string $sku,
        public bool $is_archived,
        public ?int $original_price_in_cents = null,
        public ?string $barcode = null,
        public ?Dimensions $dimensions = null,
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
