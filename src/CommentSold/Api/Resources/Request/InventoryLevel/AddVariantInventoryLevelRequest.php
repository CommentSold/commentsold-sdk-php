<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\InventoryLevel;

use CommentSold\Api\Resources\Request\AbstractRequest;

class AddVariantInventoryLevelRequest extends AbstractRequest
{
    public int $variant_id;
    public int $relative_quantity;
    public ?string $note;

    public function __construct(array $payload)
    {
        $this->variant_id        = $payload['variant_id'];
        $this->relative_quantity = $payload['relative_quantity'];
        $this->note              = $payload['note'];
    }
}
