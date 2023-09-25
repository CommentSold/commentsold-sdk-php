<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Clients\Rest;

class ShopClient
{
    private Rest $restClient;

    public function __construct(
        private readonly string $shopId,
        private readonly string $shopToken
    ) {
        $this->restClient = new Rest();
    }

    /**
     * Returns a paginated list of orders
     */
    public function getOrders(int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/orders?page={$page}&perPage={$perPage}");
    }

    /**
     * Create an order
     */
    public function createOrder(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/orders", $payload);
    }

    /**
     * Cancels the entire order
     */
    public function cancelOrder(int $orderId)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/orders/{$orderId}/cancel");
    }

    /**
     * Cancel line item from an order
     */
    public function cancelOrderLineItem(int $orderId, int $lineItemId)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/orders/{$orderId}/{$lineItemId}/cancel");
    }

    /**
     * Returns a paginated list of products
     */
    public function getProducts(int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/products?page={$page}&perPage={$perPage}");
    }

    /**
     * Add a new product
     */
    public function createProduct(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/products", $payload);
    }

    /**
     * Returns a product for the given id
     */
    public function getProduct(int $productId)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/products/{$productId}");
    }

    /**
     * Update an existing product
     */
    public function updateProduct(int $productId, array $payload)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/products/{$productId}", $payload);
    }

    /**
     * Update an existing product with only the changes sent. Images and tags replace all of their values with the new values.
     */
    public function partialUpdateProduct(int $productId, array $payload)
    {
        return $this->restClient->patch($this->shopToken, "{$this->shopId}/products/{$productId}", $payload);
    }

    /**
     * Delete a product from the catalog (this has dire consequences)
     */
    public function deleteProduct(int $productId)
    {
        return $this->restClient->delete($this->shopToken, "{$this->shopId}/products/{$productId}");
    }

    /**
     * Add a new variant to a product
     */
    public function createProductVariant(int $productId, array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/products/{$productId}/variant", $payload);
    }

    /**
     * Update an existing variant on a product
     */
    public function updateProductVariant(int $productId, int $variantId, array $payload)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/products/{$productId}/variant/{$variantId}", $payload);
    }

    /**
     * Update an existing variant with only the changes sent
     */
    public function partialUpdateProductVariant(int $productId, int $variantId, array $payload)
    {
        return $this->restClient->patch($this->shopToken, "{$this->shopId}/products/{$productId}/variant/{$variantId}", $payload);
    }

    /**
     * Delete a variant on a product from the catalog (this has dire consequences)
     */
    public function deleteProductVariant(int $productId, int $variantId)
    {
        return $this->restClient->delete($this->shopToken, "{$this->shopId}/products/{$productId}/variant/{$variantId}");
    }

    /**
     * Returns a paginated list of inventory levels
     */
    public function getInventoryLevels(int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/inventory_levels?page={$page}&perPage={$perPage}");
    }

    /**
     * Returns an inventory level for the given id
     */
    public function getVariantInventoryLevels(int $variantId)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/inventory_levels/{$variantId}");
    }

    /**
     * Add quantity to the inventory level for a variant
     */
    public function addVariantInventoryLevel(int $variantId, array $payload)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/inventory_levels/{$variantId}/add", $payload);
    }

    /**
     * Remove quantity from the inventory level for a variant
     */
    public function subtractVariantInventoryLevel(int $variantId, array $payload)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/inventory_levels/{$variantId}/subtract", $payload);
    }

    /**
     * Set on-shelf (available + held in carts) quantity absolutely for a variant (use with extreme caution)
     */
    public function setVariantOnShelfLevel(int $variantId, array $payload)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/inventory_levels/{$variantId}/set_absolute_shelf_quantity", $payload);
    }

    /**
     * Retrieve a CS Admin URL to be used to load an iframe. The URL is only valid for 10 seconds but once the iframe is loaded it can be used until the session ends.
     */
    public function getIframeUrl(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/accounts/loginLink", $payload);
    }

    /**
     * Returns a paginated list of reservations
     */
    public function getReservations(int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/reservations?page={$page}&perPage={$perPage}");
    }

    /**
     * Reserve an item. Returns an array of CommentSold reservation ids
     */
    public function reserveProductVariant(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/reservations", $payload);
    }

    /**
     * Cancel a reservation
     */
    public function deleteReservation(int $reservationId)
    {
        return $this->restClient->delete($this->shopToken, "{$this->shopId}/reservations/{$reservationId}");
    }

    /**
     * Cancel reservation(s) for the specified variant. (Not returned back to stock. Not recommended)
     */
    public function deleteReservationsByProductVariant(int $variantId, int $quantity = 1)
    {
        return $this->restClient->delete($this->shopToken, "{$this->shopId}/reservations/variant/{$variantId}?quantity={$quantity}");
    }

    /**
     * Add tracking information to a list of line items
     */
    public function addTracking(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/fulfillment/addTracking", $payload);
    }

    /**
     * Returns a paginated list of Webhooks
     */
    public function getWebhookListeners(int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/webhooks?page={$page}&perPage={$perPage}");
    }

    /**
     * Subscribe to a Webhook topic
     */
    public function addWebhookListener(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/webhooks", $payload);
    }

    /**
     * Unsubscribe a Webhook
     */
    public function deleteWebhookListener(int $webhookId)
    {
        return $this->restClient->delete($this->shopToken, "{$this->shopId}/webhooks/{$webhookId}");
    }

    /**
     * Returns a paginated list of customers
     */
    public function getCustomers(int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/customers?page={$page}&perPage={$perPage}");
    }

    /**
     * Add a new customer
     */
    public function createCustomer(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/customers", $payload);
    }

    /**
     * Returns a customer for the given CommentSold customer id
     */
    public function getCustomer(int $customerId)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/customers/{$customerId}");
    }

    /**
     * Update an existing customer
     */
    public function updateCustomer(int $customerId, array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/customers/{$customerId}", $payload);
    }

    /**
     * Returns a paginated list of customers filtered by the search term
     */
    public function searchCustomers(string $searchTerm, int $page = 1, int $perPage = Rest::PER_PAGE)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/customers/search?page={$page}&perPage={$perPage}", ['term' => $searchTerm]);
    }

    /**
     * Returns a customer for the given external customer id
     */
    public function getCustomerByExternalId(string $customerId)
    {
        return $this->restClient->get($this->shopToken, "{$this->shopId}/customers/externalId/{$customerId}");
    }

    /**
     * Updates the address for the shop
     */
    public function updateShop(array $payload)
    {
        return $this->restClient->patch($this->shopToken, "{$this->shopId}/shop", $payload);
    }

    /**
     * Update the products to have the provided category. The existing category for the products will be overwritten.
     */
    public function updateProductCategories(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/product_categories", $payload);
    }

    /**
     * Start allocations for dropship products
     */
    public function startDropshipAllocation(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/dropshipping/allocations", $payload);
    }

    /**
     * Restock allocations for dropship products
     */
    public function restockDropshipAllocation(array $payload)
    {
        return $this->restClient->put($this->shopToken, "{$this->shopId}/dropshipping/allocations", $payload);
    }

    /**
     * Calculate the estimated shipping price for a group of variants
     */
    public function estimateShipping(array $payload)
    {
        return $this->restClient->post($this->shopToken, "{$this->shopId}/shipping_calculator", $payload);
    }
}
