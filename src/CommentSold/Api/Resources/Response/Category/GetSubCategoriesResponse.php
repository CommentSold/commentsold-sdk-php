<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response\Category;

use CommentSold\Api\Resources\Response\AbstractResponse;
use CommentSold\Api\Resources\Response\Pagination;
use CommentSold\Api\Response;

class GetSubCategoriesResponse extends AbstractResponse
{
    /** @var array[Category] */
    public array $data;
    public Pagination $pagination;

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
