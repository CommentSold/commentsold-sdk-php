<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response;

abstract class AbstractResponse
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
