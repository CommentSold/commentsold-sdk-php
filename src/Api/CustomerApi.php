<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\Customer\CreateCustomerRequest;
use CommentSold\Resources\Request\Customer\GetCustomerByExternalIdRequest;
use CommentSold\Resources\Request\Customer\GetCustomerRequest;
use CommentSold\Resources\Request\Customer\GetCustomersRequest;
use CommentSold\Resources\Request\Customer\SearchCustomersRequest;
use CommentSold\Resources\Request\Customer\UpdateCustomerRequest;
use CommentSold\Resources\Response\Customer\CreateCustomerResponse;
use CommentSold\Resources\Response\Customer\GetCustomerByExternalIdResponse;
use CommentSold\Resources\Response\Customer\GetCustomerResponse;
use CommentSold\Resources\Response\Customer\GetCustomersResponse;
use CommentSold\Resources\Response\Customer\SearchCustomersResponse;
use CommentSold\Resources\Response\Customer\UpdateCustomerResponse;
use CommentSold\ShopClient;

class CustomerApi extends AbstractApi
{
    /**
     * Returns a paginated list of customers
     */
    public function getCustomers(GetCustomersRequest $payload): GetCustomersResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/customers", $payload);

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

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/customers", $payload);

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

        $response = $this->restClient->get($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/customers/{$payload->customer_id}");

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

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/customers/{$payload->customer_id}", $payload);

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

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/customers/search?page={$payload->page}&perPage={$payload->perPage}", $payload);

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

        $response = $this->restClient->get($this->client->getBaseUrl().self::API_VERSION.'/'."{$this->client->getShopId()}/customers/externalId/{$payload->external_customer_id}");

        return new GetCustomerByExternalIdResponse($response);
    }
}
