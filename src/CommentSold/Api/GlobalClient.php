<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Clients\Rest;

class GlobalClient
{
    public const PER_PAGE = 10;

    private Rest $restClient;

    public function __construct(private readonly string $partnerToken)
    {
        $this->restClient = new Rest();
    }

    /**
     * Get tax quote for cart
     */
    public function getTaxQuote(array $payload)
    {
        return $this->restClient->post($this->partnerToken, 'quote', $payload);
    }

    /**
     * Create Shop
     */
    public function createShop(array $payload)
    {
        return $this->restClient->post($this->partnerToken, 'accounts', $payload);
    }

    /**
     * Request a URL to redirect customers to prompt them for OAuth authorization
     */
    public function getOauthUrl(array $scopes, string $redirectUrl)
    {
        return $this->restClient->get($this->partnerToken, 'accounts/authorizeUrl?scopes='.implode(',', $scopes).'&redirect_uri='.$redirectUrl);
    }

    /**
     * Get sub categories of category from optional parent category ID
     */
    public function getSubCategories(int $categoryId = 0, $page = 1, $perPage = self::PER_PAGE)
    {
        return $this->restClient->get($this->partnerToken, "categories/{$categoryId}?page={$page}&perPage={$perPage}");
    }

    /**
     * Search for categories with optional parent category ID restriction
     */
    public function searchCategories(int $categoryId = 0, $page = 1, $perPage = self::PER_PAGE)
    {
        return $this->restClient->post($this->partnerToken, "search/{$categoryId}?page={$page}&perPage={$perPage}");
    }
}
