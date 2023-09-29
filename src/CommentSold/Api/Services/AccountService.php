<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\GlobalClient;
use CommentSold\Api\ShopClient;

class AccountService extends abstractService
{
    /**
     * Create Shop
     */
    public function createShop(array $payload)
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post('accounts', $payload);

        return $response->toObject();
    }

    /**
     * Request a URL to redirect customers to prompt them for OAuth authorization
     */
    public function getOauthUrl(array $scopes, string $redirectUrl)
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->get('accounts/authorizeUrl?scopes='.implode(',', $scopes).'&redirect_uri='.$redirectUrl);

        return $response->toObject();
    }

    /**
     * Retrieve a CS Admin URL to be used to load an iframe. The URL is only valid for 10 seconds but once the iframe is loaded it can be used until the session ends.
     */
    public function getIframeUrl(array $payload)
    {
        if (! $this->client instanceof ShopClient) {
            throw new InvalidContextException('Shop client required');
        }

        $response = $this->restClient->post("{$this->client->getShopId()}/accounts/loginLink", $payload);

        return $response->toObject();
    }
}
