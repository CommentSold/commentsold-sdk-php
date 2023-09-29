<?php

declare(strict_types=1);

namespace CommentSold\Api\Services;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Exception\InvalidContextException;
use CommentSold\Api\GlobalClient;

class CategoryService extends abstractService
{
    /**
     * Get sub categories of category from optional parent category ID
     */
    public function getSubCategories(int $categoryId = 0, int $page = 1, int $perPage = self::PER_PAGE)
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }

        $response = $this->restClient->get("categories/{$categoryId}?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }

    /**
     * Search for categories with optional parent category ID restriction
     */
    public function searchCategories(int $categoryId = 0, int $page = 1, int $perPage = self::PER_PAGE)
    {
        if (! $this->client instanceof GlobalClient) {
            throw new InvalidContextException('Global client required');
        }

        if ($page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }

        $response = $this->restClient->post("search/{$categoryId}?page={$page}&perPage={$perPage}");

        return $response->toObject();
    }
}
