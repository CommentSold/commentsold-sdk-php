<?php

declare(strict_types=1);

namespace Resources\Response\Category;

use Resources\Response\AbstractResponse;
use Resources\Response\Pagination;
use Response;

class SearchCategoriesResponse extends AbstractResponse
{
    public function __construct(Response $response)
    {
        $payload = $response->toObject();

        $categories = [];
        foreach ($payload->data->categories ?? [] as $category) {
            $categories[] = new Category($category);
        }

        $this->data       = $categories;
        $this->pagination = new Pagination($payload->pagination);
    }
}
