<?php

declare(strict_types=1);

namespace CommentSold\Services;

use CommentSold\Exception\InvalidContextException;
use CommentSold\GlobalClient;
use CommentSold\Resources\Request\Category\GetSubCategoriesRequest;
use CommentSold\Resources\Request\Category\SearchCategoriesRequest;
use CommentSold\Resources\Response\Category\GetSubCategoriesResponse;
use CommentSold\Resources\Response\Category\SearchCategoriesResponse;

class CategoryApi extends AbstractApi
{
    /**
     * Get sub categories of category from optional parent category ID
     */
    public function getSubCategories(GetSubCategoriesRequest $payload): GetSubCategoriesResponse
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->get("categories/{$payload->category_id}", $payload);

        return new GetSubCategoriesResponse($response);
    }

    /**
     * Search for categories with optional parent category ID restriction
     */
    public function searchCategories(SearchCategoriesRequest $payload): SearchCategoriesResponse
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        $response = $this->restClient->post("search/{$payload->category_id}?page={$payload->page}&perPage={$payload->perPage}", $payload);

        return new SearchCategoriesResponse($response);
    }
}
