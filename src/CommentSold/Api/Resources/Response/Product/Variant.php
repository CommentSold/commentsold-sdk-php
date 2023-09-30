<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Variant extends AbstractResponse
{
    public int $id;
    public int $product_id;
    public ?string $name;
    public int $price;
    public int $original_price;
    public int $cost;
    public string $sku;
    public ?string $barcode;
    public Dimensions $dimensions;
    public bool $is_archived;
    public int $total_available_quantity;
    public AttributeValues $attributes;
    public VariantDropshipDetails $dropship_details;
    public ?int $shopify_id;
    public ?int $shopify_inventory_item_id;

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
