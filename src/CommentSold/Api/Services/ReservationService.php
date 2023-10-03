<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\Resources\Request\Reservation\CancelReservationRequest;
use CommentSold\Api\Resources\Request\Reservation\CancelReservationsByVariantRequest;
use CommentSold\Api\Resources\Request\Reservation\GetReservationsRequest;
use CommentSold\Api\Resources\Request\Reservation\ReserveProductVariantRequest;
use CommentSold\Api\Resources\Response\Reservation\CancelReservationResponse;
use CommentSold\Api\Resources\Response\Reservation\CancelReservesByProductVariantResponse;
use CommentSold\Api\Resources\Response\Reservation\GetReservationsResponse;
use CommentSold\Api\Resources\Response\Reservation\ReserveProductVariantResponse;
use CommentSold\Api\ShopClient;

class ReservationService extends abstractService
{
    /**
     * Returns a paginated list of reservations
     */
    public function getReservations(GetReservationsRequest $payload): GetReservationsResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->get("{$this->client->getShopId()}/reservations", $payload);

        return new GetReservationsResponse($response);
    }

    /**
     * Reserve an item. Returns an array of CommentSold reservation ids
     */
    public function reserveProductVariant(ReserveProductVariantRequest $payload): ReserveProductVariantResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/reservations", $payload);

        return new ReserveProductVariantResponse($response);
    }

    /**
     * Cancel a reservation
     */
    public function cancelReservation(CancelReservationRequest $payload): CancelReservationResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/reservations/{$payload->reservation_id}");

        return new CancelReservationResponse($response);
    }

    /**
     * Cancel reservation(s) for the specified variant. (Not returned back to stock. Not recommended)
     */
    public function cancelReservationsByProductVariant(CancelReservationsByVariantRequest $payload): CancelReservesByProductVariantResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->delete("{$this->client->getShopId()}/reservations/variant/{$payload->variant_id}?quantity={$payload->quantity}");

        return new CancelReservesByProductVariantResponse($response);
    }
}
