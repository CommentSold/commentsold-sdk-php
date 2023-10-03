<?php

declare(strict_types=1);

namespace CommentSold\Resources\Request;

use CommentSold\Resources\AbstractResource;

abstract class AbstractRequest extends AbstractResource
{
    public const PER_PAGE = 10;
}
