<?php

declare(strict_types=1);

namespace CommentSold;

use CommentSold\Resources\ClientEnvironment;

class ShopClient extends AbstractClient
{
    public function __construct(
        private readonly string $shopId,
        private readonly string $token,
        private readonly ?ClientEnvironment $environment = null
    ) {
        parent::__construct($this->token, $this->environment);
    }

    public function getShopId(): string
    {
        return strtolower($this->shopId);
    }
}
