<?php

declare(strict_types=1);

namespace Resources\Response\Product;

use Resources\AbstractResource;

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
    public readonly AttributeNames $attribute_names;
    public readonly ?Image $main_image;
    /** @var array[Image] */
    public readonly array $additional_images;
    /** @var array[string] */
    public readonly array $tags;
    public readonly ?Category $category;
    /** @var array[Variant] */
    public readonly array $variants;
    public readonly ?ProductDropshipDetails $dropship_details;
    public readonly ?int $shopify_id;

    public function __construct(object $payload)
    {
        $additionalImages = [];
        foreach ($payload->additional_images ?? [] as $image) {
            $additionalImages[] = new Image($image);
        }

        $variants = [];
        foreach ($$payload->variants ?? [] as $variant) {
            $variants[] = new Variant($variant);
        }

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
        $this->attribute_names                    = new AttributeNames($payload->attribute_names);
        $this->main_image                         = $payload->main_image ? new Image($payload->main_image) : null;
        $this->additional_images                  = $additionalImages;
        $this->tags                               = $payload->tags;
        $this->category                           = $payload->category ? new Category($payload->category) : null;
        $this->variants                           = $variants;
        $this->dropship_details                   = $payload->dropship_details ? new ProductDropshipDetails($payload->dropship_details) : null;
        $this->shopify_id                         = $payload->shopify_id;
    }
}
