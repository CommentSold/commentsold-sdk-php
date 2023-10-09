<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Product;

use CommentSold\Resources\Request\AbstractRequest;

class PartialUpdateProductRequest extends AbstractRequest
{
    /**
     * @param  Image[]|null  $additional_images
     * @param  string[]|null  $tags
     */
    public function __construct(
        public int $product_id,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $style = null,
        public ?string $brand = null,
        public ?bool $charge_taxes = null,
        public ?string $tax_code = null,
        public ?int $shipping_price_in_cents = null,
        public ?bool $is_archived = null,
        public ?int $quantity_per_user_limit = null,
        public ?int $quantity_per_stream_per_user_limit = null,
        public ?AttributeNames $attribute_names = null,
        public ?Image $main_image = null,
        public ?array $additional_images = null,
        public ?bool $rehost_images = null,
        public ?int $shopify_id = null,
        public ?array $tags = null,
        public ?int $category = null,
    ) {
    }
}
