<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\AbstractResource;

class Variant extends AbstractResource
{
    public readonly int $id;
    public readonly int $product_id;
    public readonly ?string $name;
    public readonly int $price;
    public readonly int $original_price;
    public readonly int $cost;
    public readonly string $sku;
    public readonly ?string $barcode;
    public readonly Dimensions $dimensions;
    public readonly bool $is_archived;
    public readonly int $total_available_quantity;
    public readonly AttributeValues $attributes;
    public readonly VariantDropshipDetails $dropship_details;
    public readonly ?int $shopify_id;
    public readonly ?int $shopify_inventory_item_id;

    public function __construct(object $payload)
    {
        $this->id                        = $payload->id;
        $this->product_id                = $payload->product_id;
        $this->name                      = $payload->name;
        $this->price                     = $payload->price;
        $this->original_price            = $payload->original_price;
        $this->cost                      = $payload->cost;
        $this->sku                       = $payload->sku;
        $this->barcode                   = $payload->barcode;
        $this->dimensions                = new Dimensions($payload->dimensions);
        $this->is_archived               = $payload->is_archived;
        $this->total_available_quantity  = $payload->total_available_quantity;
        $this->attributes                = new AttributeValues($payload->attributes);
        $this->dropship_details          = new VariantDropshipDetails($payload->dropship_details);
        $this->shopify_id                = $payload->shopify_id;
        $this->shopify_inventory_item_id = $payload->shopify_inventory_item_id;
    }
}
