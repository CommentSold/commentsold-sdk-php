<?php

declare(strict_types=1);

class ShopClient extends AbstractClient
{
    public function __construct(private readonly string $shopId, private readonly string $token)
    {
        parent::__construct($this->token);
    }

    public function getShopId(): string
    {
        return $this->shopId;
    }
}
