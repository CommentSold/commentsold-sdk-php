<?php

declare(strict_types=1);

namespace Api;

use Exception\InvalidContextException;
use Resources\Request\Reservation\CancelReservationRequest;
use Resources\Request\Reservation\CancelReservationsByVariantRequest;
use Resources\Request\Reservation\GetReservationsRequest;
use Resources\Request\Reservation\ReserveProductVariantRequest;
use Resources\Response\Reservation\CancelReservationResponse;
use Resources\Response\Reservation\CancelReservesByProductVariantResponse;
use Resources\Response\Reservation\GetReservationsResponse;
use Resources\Response\Reservation\ReserveProductVariantResponse;
use ShopClient;

class ReservationApi extends AbstractApi
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
