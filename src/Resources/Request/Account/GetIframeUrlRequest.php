<?php

declare(strict_types=1);

namespace Resources\Request\Account;

use Resources\Request\AbstractRequest;

class GetIframeUrlRequest extends AbstractRequest
{
    public function __construct(public string $page)
    {
    }
}
