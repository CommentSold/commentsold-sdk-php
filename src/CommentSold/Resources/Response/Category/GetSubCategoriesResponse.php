<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Category;

use CommentSold\Resources\Response\AbstractResponse;
use CommentSold\Resources\Response\Pagination;
use CommentSold\Response;

class GetSubCategoriesResponse extends AbstractResponse
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
