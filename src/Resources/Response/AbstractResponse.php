<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response;

use CommentSold\Resources\AbstractResource;

abstract class AbstractResponse
{
    protected ?AbstractResource $data;
    protected ?Pagination $pagination;

    public function getData(): ?AbstractResource
    {
        return $this->data ?? null;
    }

    public function getPagination(): ?Pagination
    {
        return $this->pagination ?? null;
    }
}
