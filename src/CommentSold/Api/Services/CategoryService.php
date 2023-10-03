<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\GlobalClient;
use CommentSold\Api\Resources\Request\Category\GetSubCategoriesRequest;
use CommentSold\Api\Resources\Request\Category\SearchCategoriesRequest;
use CommentSold\Api\Resources\Response\Category\GetSubCategoriesResponse;
use CommentSold\Api\Resources\Response\Category\SearchCategoriesResponse;

class CategoryService extends abstractService
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
