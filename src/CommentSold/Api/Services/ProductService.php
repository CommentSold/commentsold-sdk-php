<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Product\CreateProductRequest;
use CommentSold\Api\Resources\Request\Product\CreateProductVariantRequest;
use CommentSold\Api\Resources\Request\Product\DeleteProductRequest;
use CommentSold\Api\Resources\Request\Product\DeleteProductVariantRequest;
use CommentSold\Api\Resources\Request\Product\GetProductRequest;
use CommentSold\Api\Resources\Request\Product\GetProductsRequest;
use CommentSold\Api\Resources\Request\Product\PartialUpdateProductRequest;
use CommentSold\Api\Resources\Request\Product\PartialUpdateProductVariantRequest;
use CommentSold\Api\Resources\Request\Product\UpdateProductRequest;
use CommentSold\Api\Resources\Request\Product\UpdateProductVariantRequest;
use CommentSold\Api\ShopClient;

class ProductService extends abstractService
{
    /**
     * Returns a paginated list of products
     */
    public function getProducts(GetProductsRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/products", $payload);

        return $response->toObject();
    }

    /**
     * Add a new product
     */
    public function createProduct(CreateProductRequest $payload)
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
    public function getProduct(GetProductRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/products/{$payload->product_id}");

        return $response->toObject();
    }

    /**
     * Update an existing product
     */
    public function updateProduct(UpdateProductRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/products/{$payload->product_id}", $payload);

        return $response->toObject();
    }

    /**
     * Update an existing product with only the changes sent. Images and tags replace all of their values with the new values.
     */
    public function partialUpdateProduct(PartialUpdateProductRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/products/{$payload->product_id}", $payload);

        return $response->toObject();
    }

    /**
     * Delete a product from the catalog (this has dire consequences)
     */
    public function deleteProduct(DeleteProductRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/products/{$payload->product_id}");

        return $response->toObject();
    }

    /**
     * Add a new variant to a product
     */
    public function createProductVariant(CreateProductVariantRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/products/{$payload->product_id}/variant", $payload);

        return $response->toObject();
    }

    /**
     * Update an existing variant on a product
     */
    public function updateProductVariant(UpdateProductVariantRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}", $payload);

        return $response->toObject();
    }

    /**
     * Update an existing variant with only the changes sent
     */
    public function partialUpdateProductVariant(PartialUpdateProductVariantRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch("{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}", $payload);

        return $response->toObject();
    }

    /**
     * Delete a variant on a product from the catalog (this has dire consequences)
     */
    public function deleteProductVariant(DeleteProductVariantRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}");

        return $response->toObject();
    }
}
