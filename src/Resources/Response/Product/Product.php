<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Product;

use CommentSold\Resources\AbstractResource;

class Product extends AbstractResource
{
    public readonly int $id;
    public readonly string $name;
    public readonly string $description;
    public readonly ?string $style;
    public readonly ?string $brand;
    public readonly bool $charge_taxes;
    public readonly ?string $tax_code;
    public readonly ?int $shipping_price;
    public readonly bool $is_archived;
    public readonly ?int $quantity_per_user_limit;
    public readonly ?int $quantity_per_stream_per_user_limit;
    public readonly int $created_at;
    public readonly int $updated_at;
    public readonly bool $shop_favorite;
    public readonly ?AttributeNames $attribute_names;
    public readonly ?Image $main_image;
    public readonly ImageCollection $additional_images;
    public readonly TagCollection $tags;
    public readonly ?Category $category;
    public readonly VariantCollection $variants;
    public readonly ?ProductDropshipDetails $dropship_details;
    public readonly ?int $shopify_id;

    public function __construct(object $payload)
    {
        $this->id                                 = $payload->id;
        $this->name                               = $payload->name;
        $this->description                        = $payload->description;
        $this->style                              = $payload->style;
        $this->brand                              = $payload->brand;
        $this->charge_taxes                       = $payload->charge_taxes;
        $this->tax_code                           = $payload->tax_code;
        $this->shipping_price                     = $payload->shipping_price;
        $this->is_archived                        = $payload->is_archived;
        $this->quantity_per_user_limit            = $payload->quantity_per_user_limit;
        $this->quantity_per_stream_per_user_limit = $payload->quantity_per_stream_per_user_limit;
        $this->created_at                         = $payload->created_at;
        $this->updated_at                         = $payload->updated_at;
        $this->shop_favorite                      = $payload->shop_favorite;
        $this->attribute_names                    = $payload->attribute_names ? new AttributeNames($payload->attribute_names) : null;
        $this->main_image                         = $payload->main_image ? new Image($payload->main_image) : null;
        $this->additional_images                  = new ImageCollection($payload->additional_images);
        $this->tags                               = new TagCollection($payload->tags);
        $this->category                           = $payload->category ? new Category($payload->category) : null;
        $this->variants                           = new VariantCollection($payload->variants);
        $this->dropship_details                   = $payload->dropship_details ? new ProductDropshipDetails($payload->dropship_details) : null;
        $this->shopify_id                         = $payload->shopify_id;
    }
}
