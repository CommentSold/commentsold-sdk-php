<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\ProductCategory\UpdateProductCategoriesRequest;
use CommentSold\Resources\Response\ProductCategory\UpdateProductCategoriesResponse;
use CommentSold\ShopClient;

class ProductCategoryApi extends AbstractApi
{
    /**
     * Update the products to have the provided category. The existing category for the products will be overwritten.
     */
    public function updateProductCategories(UpdateProductCategoriesRequest $payload): UpdateProductCategoriesResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().'/'.self::API_VERSION."{$this->client->getShopId()}/product_categories", $payload);

        return new UpdateProductCategoriesResponse($response);
    }
}
