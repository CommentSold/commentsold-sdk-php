<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response;

use CommentSold\Resources\AbstractResource;

class Pagination extends AbstractResource
{
    public readonly int $total;
    public readonly int $count;
    public readonly int $perPage;
    public readonly int $currentPage;
    public readonly int $totalPages;

    public function __construct(object $payload)
    {
        $this->total       = $payload->total;
        $this->count       = $payload->count;
        $this->perPage     = $payload->perPage;
        $this->currentPage = $payload->currentPage;
        $this->totalPages  = $payload->totalPages;
    }
}
