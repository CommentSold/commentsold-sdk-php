<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Response;

use CommentSold\Api\Resources\AbstractResource;

abstract class AbstractResponse extends AbstractResource
{
    protected $data;
    protected $pagination;

    public function getData()
    {
        return $this->data ?? null;
    }

    public function getPagination()
    {
        return $this->pagination ?? null;
    }
}
