<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Exception\InvalidContextException;
use CommentSold\GlobalClient;
use CommentSold\Resources\Request\Account\CreateShopRequest;
use CommentSold\Resources\Request\Account\GetIframeUrlRequest;
use CommentSold\Resources\Request\Account\GetOauthUrlRequest;
use CommentSold\Resources\Response\Account\CreateShopResponse;
use CommentSold\Resources\Response\Account\GetIframeUrlResponse;
use CommentSold\Resources\Response\Account\GetOauthUrlResponse;
use CommentSold\ShopClient;

class AccountApi extends AbstractApi
{
    /**
     * Create Shop
     */
    public function createShop(CreateShopRequest $payload): CreateShopResponse
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'.'accounts', $payload);

        return new CreateShopResponse($response);
    }

    /**
     * Request a URL to redirect customers to prompt them for OAuth authorization
     */
    public function getOauthUrl(GetOauthUrlRequest $payload): GetOauthUrlResponse
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'.'accounts/authorizeUrl', $payload);

        return new GetOauthUrlResponse($response);
    }

    /**
     * Retrieve a CS Admin URL to be used to load an iframe. The URL is only valid for 10 seconds but once the iframe is loaded it can be used until the session ends.
     */
    public function getIframeUrl(GetIframeUrlRequest $payload): GetIframeUrlResponse
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post($this->client->getBaseUrl().self::API_VERSION.'/'.$this->client->getShopId().'/accounts/loginLink', $payload);

        return new GetIframeUrlResponse($response);
    }
}
