<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Exception\InvalidResponseException;

class CustomerService extends abstractService
{
    /**
     * Returns a paginated list of customers
     */
    public function getCustomers(int $page = 1, int $perPage = self::PER_PAGE)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Add a new customer
     */
    public function createCustomer(array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers", $payload);

        return $response->toObject();
    }

    /**
     * Returns a customer for the given CommentSold customer id
     */
    public function getCustomer(int $customerId)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers/{$customerId}");

        return $response->toObject();
    }

    /**
     * Update an existing customer
     */
    public function updateCustomer(int $customerId, array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers/{$customerId}", $payload);

        return $response->toObject();
    }

    /**
     * Returns a paginated list of customers filtered by the search term
     */
    public function searchCustomers(string $searchTerm, int $page = 1, int $perPage = self::PER_PAGE)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }
        if (! $searchTerm) {
            throw new InvalidResponseException('Search term can not be empty');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/customers/search?page={$page}&perPage={$perPage}", ['term' => $searchTerm]);

        return $response->toObject();
    }

    /**
     * Returns a customer for the given external customer id
     */
    public function getCustomerByExternalId(string $customerId)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/customers/externalId/{$customerId}");

        return $response->toObject();
    }
}
