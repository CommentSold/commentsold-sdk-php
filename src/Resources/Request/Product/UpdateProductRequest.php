<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Product;

use CommentSold\Exception\InvalidArgumentException;
use CommentSold\Resources\Request\AbstractRequest;

class UpdateProductRequest extends AbstractRequest
{
    /**
     * @param  Image[]|null  $additional_images
     * @param  string[]|null  $tags
     * @param  int[]|null  $collections
     *
     * @throws InvalidArgumentException
     */
    public function __construct(
        public int $product_id,
        public string $name,
        public bool $charge_taxes,
        public bool $is_archived,
        public ?string $style = null,
        public ?string $sku = null,
        public ?string $description = null,
        public ?string $short_description = null,
        public ?string $brand = null,
        public ?string $brand_style = null,
        public ?string $tax_code = null,
        public ?int $shipping_price_in_cents = null,
        public ?int $location_id = null,
        public ?int $quantity_per_user_limit = null,
        public ?int $quantity_per_stream_per_user_limit = null,
        public ?AttributeNames $attribute_names = null,
        public ?Image $main_image = null,
        public ?array $additional_images = null,
        public ?bool $rehost_images = null,
        public ?int $shopify_id = null,
        public ?array $tags = null,
        public ?int $category = null,
        public ?array $collections = null,
        public ?bool $published = null,
        public ?int $published_at = null,
        public ?string $split_by = null,
    ) {
        if (! $this->style && ! $this->sku) {
            throw new InvalidArgumentException('One of style or SKU is required');
        }
        if ($this->split_by && ! in_array($this->split_by, ['color', 'size'])) {
            throw new InvalidArgumentException('Split by must be one of "color" or "size"');
        }
    }
}
