<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\ProductCategory\UpdateProductCategoriesRequest;
use Resources\Response\ProductCategory\UpdateProductCategoriesResponse;
use ShopClient;

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

        $response = $this->restClient->post("{$this->client->getShopId()}/product_categories", $payload);

        return new UpdateProductCategoriesResponse($response);
    }
}
