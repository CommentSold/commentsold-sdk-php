<?php

declare(strict_types=1);

namespace Resources\Request;

use Resources\AbstractResource;

abstract class AbstractRequest extends AbstractResource
{
    public const PER_PAGE = 10;
}
