<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\InventoryLevel\AddVariantInventoryLevelRequest;
use CommentSold\Api\Resources\Request\InventoryLevel\GetInventoryLevelsRequest;
use CommentSold\Api\Resources\Request\InventoryLevel\GetVariantInventoryLevelsRequest;
use CommentSold\Api\Resources\Request\InventoryLevel\SetVariantOnShelfLevelRequest;
use CommentSold\Api\Resources\Request\InventoryLevel\SubtractVariantInventoryLevelRequest;
use CommentSold\Api\ShopClient;

class InventoryLevelService extends abstractService
{
    /**
     * Returns a paginated list of inventory levels
     */
    public function getInventoryLevels(GetInventoryLevelsRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response =  $this->restClient->get("{$this->client->getShopId()}/inventory_levels", $payload);

        return $response->toObject();
    }

    /**
     * Returns an inventory level for the given id
     */
    public function getVariantInventoryLevels(GetVariantInventoryLevelsRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}");

        return $response->toObject();
    }

    /**
     * Add quantity to the inventory level for a variant
     */
    public function addVariantInventoryLevel(AddVariantInventoryLevelRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}/add", $payload);

        return $response->toObject();
    }

    /**
     * Remove quantity from the inventory level for a variant
     */
    public function subtractVariantInventoryLevel(SubtractVariantInventoryLevelRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}/subtract", $payload);

        return $response->toObject();
    }

    /**
     * Set on-shelf (available + held in carts) quantity absolutely for a variant (use with extreme caution)
     */
    public function setVariantOnShelfLevel(SetVariantOnShelfLevelRequest $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}/set_absolute_shelf_quantity", $payload);

        return $response->toObject();
    }
}
