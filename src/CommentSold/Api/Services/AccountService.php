<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\GlobalClient;
use CommentSold\Api\Resources\Request\Account\CreateShopRequest;
use CommentSold\Api\Resources\Request\Account\GetIframeUrlRequest;
use CommentSold\Api\Resources\Request\Account\GetOauthUrlRequest;
use CommentSold\Api\Resources\Response\Account\CreateShopResponse;
use CommentSold\Api\Resources\Response\Account\GetIframeUrlResponse;
use CommentSold\Api\Resources\Response\Account\GetOauthUrlResponse;
use CommentSold\Api\ShopClient;

class AccountService extends abstractService
{
    /**
     * Create Shop
     */
    public function createShop(CreateShopRequest $payload): CreateShopResponse
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post('accounts', $payload);

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

        $response = $this->restClient->get('accounts/authorizeUrl?scopes='.implode(',', $payload->scopes).'&redirect_uri='.$payload->redirect_uri);

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

        $response = $this->restClient->post("{$this->client->getShopId()}/accounts/loginLink", $payload);

        return new GetIframeUrlResponse($response);
    }
}
