<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response;

class Pagination extends AbstractResponse
{
    public int $total;
    public int $count;
    public int $perPage;
    public int $currentPage;
    public int $totalPages;

    public function __construct(object $payload)
    {
        $this->total       = $payload->total;
        $this->count       = $payload->count;
        $this->perPage     = $payload->perPage;
        $this->currentPage = $payload->currentPage;
        $this->totalPages  = $payload->totalPages;
    }
}
