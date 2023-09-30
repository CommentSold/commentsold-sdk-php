<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Product;

use CommentSold\Api\Resources\Response\AbstractResponse;

class Product extends AbstractResponse
{
    public int $id;
    public string $name;
    public string $description;
    public ?string $style;
    public ?string $brand;
    public bool $charge_taxes;
    public ?string $tax_code;
    public ?int $shipping_price;
    public bool $is_archived;
    public ?int $quantity_per_user_limit;
    public ?int $quantity_per_stream_per_user_limit;
    public int $created_at;
    public int $updated_at;
    public bool $shop_favorite;
    public AttributeNames $attribute_names;
    public ?Image $main_image;
    /** @var array[Image] */
    public array $additional_images;
    /** @var array[string] */
    public array $tags;
    public ?Category $category;
    /** @var array[Variant] */
    public array $variants;
    public ?ProductDropshipDetails $dropship_details;
    public ?int $shopify_id;

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
