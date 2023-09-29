<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\Category;

use CommentSold\Api\Exception\InvalidArgumentException;
use CommentSold\Api\Resources\Request\AbstractRequest;
use CommentSold\Api\Services\AbstractService;

class SearchCategoriesRequest extends AbstractRequest
{
    public string $term;
    public int $category_id = 0;
    public int $page = 1;
    public int $perPage = AbstractService::PER_PAGE;

    public function __construct(array $payload)
    {
        $this->term        = $payload['term'];
        $this->category_id = $payload['category_id'];
        $this->page        = $payload['page'];
        $this->perPage     = $payload['perPage'];

        if ($this->page < 1) {
            throw new InvalidArgumentException('Page can not be less than 1');
        }
        if ($this->perPage < 1) {
            throw new InvalidArgumentException('PerPage can not be less than 1');
        }
        if (! $this->term) {
            throw new InvalidArgumentException('Search term can not be empty');
        }
    }
}
