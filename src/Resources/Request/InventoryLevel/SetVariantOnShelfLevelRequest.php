<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\InventoryLevel;

use CommentSold\Resources\Request\AbstractRequest;

class SetVariantOnShelfLevelRequest extends AbstractRequest
{
    public function __construct(
        public int $variant_id,
        public int $absolute_quantity,
        public ?string $note = null,
        public ?int $updated_at = null,
    ) {
    }
}
