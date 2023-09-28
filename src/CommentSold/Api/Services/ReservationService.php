<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Enums\Context;
use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;

class ReservationService extends abstractService
{
    /**
     * Returns a paginated list of reservations
     */
    public function getReservations(int $page = 1, int $perPage = self::PER_PAGE)
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

        $response = $this->restClient->get("{$this->client->getShopId()}/reservations?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Reserve an item. Returns an array of CommentSold reservation ids
     */
    public function reserveProductVariant(array $payload)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/reservations", $payload);

        return $response->toObject();
    }

    /**
     * Cancel a reservation
     */
    public function deleteReservation(int $reservationId)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/reservations/{$reservationId}");

        return $response->toObject();
    }

    /**
     * Cancel reservation(s) for the specified variant. (Not returned back to stock. Not recommended)
     */
    public function deleteReservationsByProductVariant(int $variantId, int $quantity = 1)
    {
        if ($this->client->getContext() != Context::Shop) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/reservations/variant/{$variantId}?quantity={$quantity}");

        return $response->toObject();
    }
}
