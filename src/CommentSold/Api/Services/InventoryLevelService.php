<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;

class InventoryLevelService extends abstractService
{
    /**
     * Returns a paginated list of inventory levels
     */
    public function getInventoryLevels(int $page = 1, int $perPage = self::PER_PAGE)
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

        $response =  $this->restClient->get("{$this->client->getShopId()}/inventory_levels?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Returns an inventory level for the given id
     */
    public function getVariantInventoryLevels(int $variantId)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/inventory_levels/{$variantId}");

        return $response->toObject();
    }

    /**
     * Add quantity to the inventory level for a variant
     */
    public function addVariantInventoryLevel(int $variantId, array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$variantId}/add", $payload);

        return $response->toObject();
    }

    /**
     * Remove quantity from the inventory level for a variant
     */
    public function subtractVariantInventoryLevel(int $variantId, array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$variantId}/subtract", $payload);

        return $response->toObject();
    }

    /**
     * Set on-shelf (available + held in carts) quantity absolutely for a variant (use with extreme caution)
     */
    public function setVariantOnShelfLevel(int $variantId, array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$variantId}/set_absolute_shelf_quantity", $payload);

        return $response->toObject();
    }
}
