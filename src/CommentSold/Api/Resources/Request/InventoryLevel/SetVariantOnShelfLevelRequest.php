<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request\InventoryLevel;

use CommentSold\Api\Resources\Request\AbstractRequest;

class SetVariantOnShelfLevelRequest extends AbstractRequest
{
    public int $variant_id;
    public int $absolute_quantity;
    public ?string $note;

    public function __construct(array $payload)
    {
        $this->variant_id        = $payload['variant_id'];
        $this->absolute_quantity = $payload['absolute_quantity'];
        $this->note              = $payload['note'];
    }
}
