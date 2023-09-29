<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Resources\Request\AbstractRequest;

class UpdateProductRequest extends AbstractRequest
{
    public int $product_id;
    public string $name;
    public ?string $description = null;
    public string $style;
    public ?string $brand = null;
    public bool $charge_taxes;
    public ?string $tax_code = null;
    public ?int $shipping_price_in_cents = null;
    public bool $is_archived;
    public ?int $quantity_per_user_limit = null;
    public ?int $quantity_per_stream_per_user_limit = null;
    public ?Attributes $attribute_names = null;
    public ?Image $main_image = null;
    /** @var array[Image]|null */
    public ?array $additional_images = null;
    public ?bool $rehost_images = null;
    public ?int $shopify_id = null;
    /** @var array[string]|null */
    public ?array $tags = null;
    public ?int $category = null;

    public function __construct(array $payload)
    {
        $additional_images = [];
        if (isset($payload['additional_images'])) {
            foreach ($payload['additional_images'] as $image) {
                $additional_images[] = new Image($image);
            }
        }

        $this->product_id                         = $payload['product_id'];
        $this->name                               = $payload['name'];
        $this->description                        = $payload['description'] ?? null;
        $this->style                              = $payload['style'];
        $this->brand                              = $payload['brand'] ?? null;
        $this->charge_taxes                       = $payload['charge_taxes'];
        $this->tax_code                           = $payload['tax_code'] ?? null;
        $this->shipping_price_in_cents            = $payload['shipping_price_in_cents'] ?? null;
        $this->is_archived                        = $payload['is_archived'];
        $this->quantity_per_user_limit            = $payload['quantity_per_user_limit'] ?? null;
        $this->quantity_per_stream_per_user_limit = $payload['quantity_per_stream_per_user_limit'] ?? null;
        $this->attribute_names                    = isset($payload['attribute_names']) ? new Attributes($payload['attribute_names']) : null;
        $this->main_image                         = isset($payload['main_image']) ? new Image($payload['main_image']) : null;
        $this->additional_images                  = $additional_images ?: null;
        $this->rehost_images                      = $payload['rehost_images'] ?? null;
        $this->shopify_id                         = $payload['shopify_id'] ?? null;
        $this->tags                               = $payload['tags'] ?? null;
        $this->category                           = $payload['category'] ?? null;
    }
}
