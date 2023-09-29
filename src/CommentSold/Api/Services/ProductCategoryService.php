<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\ShopClient;

class ProductCategoryService extends abstractService
{
    /**
     * Update the products to have the provided category. The existing category for the products will be overwritten.
     */
    public function updateProductCategories(array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/product_categories", $payload);

        return $response->toObject();
    }
}