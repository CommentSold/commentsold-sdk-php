<?php

declare(strict_types=1);

namespace CommentSold\Api;

use CommentSold\Api\Enums\Context;

class ShopClient extends AbstractClient
{
    public function __construct(private readonly string $shopId, private readonly string $token)
    {
        parent::__construct($this->token);
    }

    public function getContext(): Context
    {
        return Context::Shop;
    }

    public function getShopId(): string
    {
        return $this->shopId;
    }
}
