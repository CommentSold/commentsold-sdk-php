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
use CommentSold\Api\Resources\Response\Customer\CreateCustomerResponse;
use CommentSold\Api\Resources\Response\Customer\GetCustomerByExternalIdResponse;
use CommentSold\Api\Resources\Response\Customer\GetCustomerResponse;
use CommentSold\Api\Resources\Response\Customer\GetCustomersResponse;
use CommentSold\Api\Resources\Response\Customer\SearchCustomersResponse;
use CommentSold\Api\Resources\Response\Customer\UpdateCustomerResponse;
use CommentSold\Api\ShopClient;

class CustomerService extends abstractService
{
    /**
     * Returns a paginated list of customers
     */
    public function getCustomers(GetCustomersRequest $payload): GetCustomersResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers", $payload);

        return new GetCustomersResponse($response);
    }

    /**
     * Add a new customer
     */
    public function createCustomer(CreateCustomerRequest $payload): CreateCustomerResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers", $payload);

        return new CreateCustomerResponse($response);
    }

    /**
     * Returns a customer for the given CommentSold customer id
     */
    public function getCustomer(GetCustomerRequest $payload): GetCustomerResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers/{$payload->customer_id}");

        return new GetCustomerResponse($response);
    }

    /**
     * Update an existing customer
     */
    public function updateCustomer(UpdateCustomerRequest $payload): UpdateCustomerResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers/{$payload->customer_id}", $payload);

        return new UpdateCustomerResponse($response);
    }

    /**
     * Returns a paginated list of customers filtered by the search term
     */
    public function searchCustomers(SearchCustomersRequest $payload): SearchCustomersResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers/search?page={$payload->page}&perPage={$payload->perPage}", $payload);

        return new SearchCustomersResponse($response);
    }

    /**
     * Returns a customer for the given external customer id
     */
    public function getCustomerByExternalId(GetCustomerByExternalIdRequest $payload): GetCustomerByExternalIdResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers/externalId/{$payload->external_customer_id}");

        return new GetCustomerByExternalIdResponse($response);
    }
}
