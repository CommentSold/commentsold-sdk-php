<?php

declare(strict_types=1);

namespace CommentSold\Api\Resources\Request;

use CommentSold\Api\Resources\AbstractResource;

abstract class AbstractRequest extends AbstractResource
{
    public const PER_PAGE = 10;
}
