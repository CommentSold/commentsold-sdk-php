<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\Resources\Request\InventoryLevel\AddVariantInventoryLevelRequest;
use CommentSold\Resources\Request\InventoryLevel\GetInventoryLevelsRequest;
use CommentSold\Resources\Request\InventoryLevel\GetVariantInventoryLevelsRequest;
use CommentSold\Resources\Request\InventoryLevel\SetVariantOnShelfLevelRequest;
use CommentSold\Resources\Request\InventoryLevel\SubtractVariantInventoryLevelRequest;
use CommentSold\Resources\Response\InventoryLevel\AddVariantInventoryLevelResponse;
use CommentSold\Resources\Response\InventoryLevel\GetInventoryLevelsResponse;
use CommentSold\Resources\Response\InventoryLevel\GetVariantInventoryLevelsResponse;
use CommentSold\Resources\Response\InventoryLevel\SetVariantOnShelfLevelResponse;
use CommentSold\Resources\Response\InventoryLevel\SubtractVariantInventoryLevelResponse;
use CommentSold\ShopClient;

class InventoryLevelApi extends AbstractApi
{
    /**
     * Returns a paginated list of inventory levels
     */
    public function getInventoryLevels(GetInventoryLevelsRequest $payload): GetInventoryLevelsResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response =  $this->restClient->get("{$this->client->getShopId()}/inventory_levels", $payload);

        return new GetInventoryLevelsResponse($response);
    }

    /**
     * Returns an inventory level for the given id
     */
    public function getVariantInventoryLevels(GetVariantInventoryLevelsRequest $payload): GetVariantInventoryLevelsResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}");

        return new GetVariantInventoryLevelsResponse($response);
    }

    /**
     * Add quantity to the inventory level for a variant
     */
    public function addVariantInventoryLevel(AddVariantInventoryLevelRequest $payload): AddVariantInventoryLevelResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}/add", $payload);

        return new AddVariantInventoryLevelResponse($response);
    }

    /**
     * Remove quantity from the inventory level for a variant
     */
    public function subtractVariantInventoryLevel(SubtractVariantInventoryLevelRequest $payload): SubtractVariantInventoryLevelResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}/subtract", $payload);

        return new SubtractVariantInventoryLevelResponse($response);
    }

    /**
     * Set on-shelf (available + held in carts) quantity absolutely for a variant (use with extreme caution)
     */
    public function setVariantOnShelfLevel(SetVariantOnShelfLevelRequest $payload): SetVariantOnShelfLevelResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->put("{$this->client->getShopId()}/inventory_levels/{$payload->variant_id}/set_absolute_shelf_quantity", $payload);

        return new SetVariantOnShelfLevelResponse($response);
    }
}
