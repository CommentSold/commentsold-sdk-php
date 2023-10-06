<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Product;

use CommentSold\Resources\Request\AbstractRequest;

class UpdateProductRequest extends AbstractRequest
{
    public function __construct(
        public int $product_id,
        public string $name,
        public string $style,
        public bool $charge_taxes,
        public bool $is_archived,
        public ?string $description = null,
        public ?string $brand = null,
        public ?string $tax_code = null,
        public ?int $shipping_price_in_cents = null,
        public ?int $quantity_per_user_limit = null,
        public ?int $quantity_per_stream_per_user_limit = null,
        public ?AttributeNames $attribute_names = null,
        public ?Image $main_image = null,
        /** @var Image[]|null */
        public ?array $additional_images = null,
        public ?bool $rehost_images = null,
        public ?int $shopify_id = null,
        /** @var string[]|null */
        public ?array $tags = null,
        public ?int $category = null,
    ) {
    }
}
