<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Customer\CreateCustomerRequest;
use CommentSold\Api\Resources\Request\Customer\GetCustomerByExternalIdRequest;
use CommentSold\Api\Resources\Request\Customer\GetCustomerRequest;
use CommentSold\Api\Resources\Request\Customer\GetCustomersRequest;
use CommentSold\Api\Resources\Request\Customer\SearchCustomersRequest;
use CommentSold\Api\Resources\Request\Customer\UpdateCustomerRequest;
use CommentSold\Api\ShopClient;

class CustomerService extends abstractService
{
    /**
     * Returns a paginated list of customers
     */
    public function getCustomers(GetCustomersRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers", $payload);

        return $response->toObject();
    }

    /**
     * Add a new customer
     */
    public function createCustomer(CreateCustomerRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers", $payload);

        return $response->toObject();
    }

    /**
     * Returns a customer for the given CommentSold customer id
     */
    public function getCustomer(GetCustomerRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers/{$payload->customer_id}");

        return $response->toObject();
    }

    /**
     * Update an existing customer
     */
    public function updateCustomer(UpdateCustomerRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers/{$payload->customer_id}", $payload);

        return $response->toObject();
    }

    /**
     * Returns a paginated list of customers filtered by the search term
     */
    public function searchCustomers(SearchCustomersRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers/search?page={$payload->page}&perPage={$payload->perPage}", $payload);

        return $response->toObject();
    }

    /**
     * Returns a customer for the given external customer id
     */
    public function getCustomerByExternalId(GetCustomerByExternalIdRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers/externalId/{$payload->external_customer_id}");

        return $response->toObject();
    }
}
