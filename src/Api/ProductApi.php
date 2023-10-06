<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Product\CreateProductRequest;
use CommentSold\Resources\Request\Product\CreateProductVariantRequest;
use CommentSold\Resources\Request\Product\DeleteProductRequest;
use CommentSold\Resources\Request\Product\DeleteProductVariantRequest;
use CommentSold\Resources\Request\Product\GetProductRequest;
use CommentSold\Resources\Request\Product\GetProductsRequest;
use CommentSold\Resources\Request\Product\PartialUpdateProductRequest;
use CommentSold\Resources\Request\Product\PartialUpdateProductVariantRequest;
use CommentSold\Resources\Request\Product\UpdateProductRequest;
use CommentSold\Resources\Request\Product\UpdateProductVariantRequest;
use CommentSold\Resources\Response\Product\CreateProductResponse;
use CommentSold\Resources\Response\Product\CreateProductVariantResponse;
use CommentSold\Resources\Response\Product\DeleteProductResponse;
use CommentSold\Resources\Response\Product\DeleteProductVariantResponse;
use CommentSold\Resources\Response\Product\GetProductResponse;
use CommentSold\Resources\Response\Product\GetProductsResponse;
use CommentSold\Resources\Response\Product\PartialUpdateProductResponse;
use CommentSold\Resources\Response\Product\PartialUpdateProductVariantResponse;
use CommentSold\Resources\Response\Product\UpdateProductResponse;
use CommentSold\Resources\Response\Product\UpdateProductVariantResponse;
use CommentSold\ShopClient;

class ProductApi extends AbstractApi
{
    /**
     * Returns a paginated list of products
     */
    public function getProducts(GetProductsRequest $payload): GetProductsResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products", $payload);

        return new GetProductsResponse($response);
    }

    /**
     * Add a new product
     */
    public function createProduct(CreateProductRequest $payload): CreateProductResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products", $payload);

        return new CreateProductResponse($response);
    }

    /**
     * Returns a product for the given id
     */
    public function getProduct(GetProductRequest $payload): GetProductResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}");

        return new GetProductResponse($response);
    }

    /**
     * Update an existing product
     */
    public function updateProduct(UpdateProductRequest $payload): UpdateProductResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}", $payload);

        return new UpdateProductResponse($response);
    }

    /**
     * Update an existing product with only the changes sent. Images and tags replace all of their values with the new values.
     */
    public function partialUpdateProduct(PartialUpdateProductRequest $payload): PartialUpdateProductResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}", $payload);

        return new PartialUpdateProductResponse($response);
    }

    /**
     * Delete a product from the catalog (this has dire consequences)
     */
    public function deleteProduct(DeleteProductRequest $payload): DeleteProductResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}");

        return new DeleteProductResponse($response);
    }

    /**
     * Add a new variant to a product
     */
    public function createProductVariant(CreateProductVariantRequest $payload): CreateProductVariantResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}/variant", $payload);

        return new CreateProductVariantResponse($response);
    }

    /**
     * Update an existing variant on a product
     */
    public function updateProductVariant(UpdateProductVariantRequest $payload): UpdateProductVariantResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}", $payload);

        return new UpdateProductVariantResponse($response);
    }

    /**
     * Update an existing variant with only the changes sent
     */
    public function partialUpdateProductVariant(PartialUpdateProductVariantRequest $payload): PartialUpdateProductVariantResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->patch($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}", $payload);

        return new PartialUpdateProductVariantResponse($response);
    }

    /**
     * Delete a variant on a product from the catalog (this has dire consequences)
     */
    public function deleteProductVariant(DeleteProductVariantRequest $payload): DeleteProductVariantResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}");

        return new DeleteProductVariantResponse($response);
    }
}
