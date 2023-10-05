<?php

declare(strict_types=1);

namespace CommentSold\Enums;

use CommentSold\Exception\InvalidContextException;

enum Environment
{
    case PRODUCTION;
    case SANDBOX;
    case CUSTOM;

    public function getBaseAPIUrl(): string
    {
        return match ($this) {
            Environment::PRODUCTION => 'https://openapi.commentsold.com/',
            Environment::SANDBOX    => 'https://openapi.commentsoldpartners.com/',
            default                 => throw new InvalidContextException('No API URL set'),
        };
    }

    public function getBaseTokenizerUrl(): string
    {
        return match ($this) {
            Environment::PRODUCTION => 'https://tokens.cs-api.com/',
            Environment::SANDBOX    => 'https://tokens-partners.cs-api.com/',
            default                 => throw new InvalidContextException('No Tokenizer URL set'),
        };
    }
}
