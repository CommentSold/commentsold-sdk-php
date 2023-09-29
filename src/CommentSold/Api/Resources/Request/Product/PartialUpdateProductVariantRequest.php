<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Product;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;

class PartialUpdateProductVariantRequest extends AbstractRequest
{
    public int $product_id;
    public int $variant_id;
    public ?string $name = null;
    public ?int $price_in_cents = null;
    public ?int $original_price_in_cents = null;
    public ?int $cost_in_cents = null;
    public ?string $sku = null;
    public ?string $barcode = null;
    public ?Dimensions $dimensions = null;

    public ?bool $is_archived = null;
    public ?Attributes $attributes = null;
    public ?int $shopify_id = null;
    public ?int $shopify_inventory_item_id = null;

    public function __construct(array $payload)
    {
        $this->product_id                = $payload['product_id'];
        $this->variant_id                = $payload['variant_id'];
        $this->name                      = $payload['name'] ?? null;
        $this->price_in_cents            = $payload['price_in_cents'] ?? null;
        $this->original_price_in_cents   = $payload['original_price_in_cents'] ?? null;
        $this->cost_in_cents             = $payload['cost_in_cents'] ?? null;
        $this->sku                       = $payload['sku'] ?? null;
        $this->barcode                   = $payload['barcode'] ?? null;
        $this->dimensions                = isset($payload['dimensions']) ? new Dimensions($payload['dimensions']) : null;
        $this->is_archived               = $payload['is_archived'] ?? null;
        $this->attributes                = isset($payload['attributes']) ? new Attributes($payload['attributes']) : null;
        $this->shopify_id                = $payload['shopify_id'] ?? null;
        $this->shopify_inventory_item_id = $payload['shopify_inventory_item_id'] ?? null;

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
