<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request\Reservation;

use CommentSold\Resources\Request\AbstractRequest;

class ReserveProductVariantRequest extends AbstractRequest
{
    public function __construct(
        public int $variant_id,
        public int $quantity,
        public ?int $customer_id = null,
        public ?string $external_customer_id = null,
        public ?bool $do_not_hold = null,
        public ?MetaData $meta = null,
    ) {
    }
}
