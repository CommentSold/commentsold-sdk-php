<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Product\CreateProductRequest;
use Resources\Request\Product\CreateProductVariantRequest;
use Resources\Request\Product\DeleteProductRequest;
use Resources\Request\Product\DeleteProductVariantRequest;
use Resources\Request\Product\GetProductRequest;
use Resources\Request\Product\GetProductsRequest;
use Resources\Request\Product\PartialUpdateProductRequest;
use Resources\Request\Product\PartialUpdateProductVariantRequest;
use Resources\Request\Product\UpdateProductRequest;
use Resources\Request\Product\UpdateProductVariantRequest;
use Resources\Response\Product\CreateProductResponse;
use Resources\Response\Product\CreateProductVariantResponse;
use Resources\Response\Product\DeleteProductResponse;
use Resources\Response\Product\DeleteProductVariantResponse;
use Resources\Response\Product\GetProductResponse;
use Resources\Response\Product\GetProductsResponse;
use Resources\Response\Product\PartialUpdateProductResponse;
use Resources\Response\Product\PartialUpdateProductVariantResponse;
use Resources\Response\Product\UpdateProductResponse;
use Resources\Response\Product\UpdateProductVariantResponse;
use ShopClient;

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

        $response = $this->restClient->get("{$this->client->getShopId()}/products", $payload);

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

        $response = $this->restClient->post("{$this->client->getShopId()}/products", $payload);

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

        $response = $this->restClient->get("{$this->client->getShopId()}/products/{$payload->product_id}");

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

        $response = $this->restClient->put("{$this->client->getShopId()}/products/{$payload->product_id}", $payload);

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

        $response = $this->restClient->patch("{$this->client->getShopId()}/products/{$payload->product_id}", $payload);

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

        $response = $this->restClient->delete("{$this->client->getShopId()}/products/{$payload->product_id}");

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

        $response = $this->restClient->post("{$this->client->getShopId()}/products/{$payload->product_id}/variant", $payload);

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

        $response = $this->restClient->put("{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}", $payload);

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

        $response = $this->restClient->patch("{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}", $payload);

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

        $response = $this->restClient->delete("{$this->client->getShopId()}/products/{$payload->product_id}/variant/{$payload->variant_id}");

        return new DeleteProductVariantResponse($response);
    }
}
