<?php

declare(strict_types=1);

use Exception\InvalidContextException;

class GlobalClient extends AbstractClient
{
    // This really should never get called but liked the two clients having the same methods
    public function getShopId(): string
    {
        throw new InvalidContextException('Global client does not have a shopId');
    }
}
