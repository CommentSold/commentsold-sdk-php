<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\ShopClient;

class ProductService extends abstractService
{
    /**
     * Returns a paginated list of products
     */
    public function getProducts(int $page = 1, int $perPage = self::PER_PAGE)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/products?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Add a new product
     */
    public function createProduct(array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/products", $payload);

        return $response->toObject();
    }

    /**
     * Returns a product for the given id
     */
    public function getProduct(int $productId)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/products/{$productId}");

        return $response->toObject();
    }

    /**
     * Update an existing product
     */
    public function updateProduct(int $productId, array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/products/{$productId}", $payload);

        return $response->toObject();
    }

    /**
     * Update an existing product with only the changes sent. Images and tags replace all of their values with the new values.
     */
    public function partialUpdateProduct(int $productId, array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/products/{$productId}", $payload);

        return $response->toObject();
    }

    /**
     * Delete a product from the catalog (this has dire consequences)
     */
    public function deleteProduct(int $productId)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/products/{$productId}");

        return $response->toObject();
    }

    /**
     * Add a new variant to a product
     */
    public function createProductVariant(int $productId, array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/products/{$productId}/variant", $payload);

        return $response->toObject();
    }

    /**
     * Update an existing variant on a product
     */
    public function updateProductVariant(int $productId, int $variantId, array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/products/{$productId}/variant/{$variantId}", $payload);

        return $response->toObject();
    }

    /**
     * Update an existing variant with only the changes sent
     */
    public function partialUpdateProductVariant(int $productId, int $variantId, array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/products/{$productId}/variant/{$variantId}", $payload);

        return $response->toObject();
    }

    /**
     * Delete a variant on a product from the catalog (this has dire consequences)
     */
    public function deleteProductVariant(int $productId, int $variantId)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/products/{$productId}/variant/{$variantId}");

        return $response->toObject();
    }
}
