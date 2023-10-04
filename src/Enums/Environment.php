<?php

declare(strict_types=1);

namespace CommentSold\Enums;

enum Environment
{
    case PRODUCTION;
    case SANDBOX;
    case CUSTOM;

    public function getBaseAPIUrl(): string
    {
        return match ($this) {
            Environment::PRODUCTION => 'https://openapi.commentsold.com/v1',
            Environment::SANDBOX    => 'https://openapi.commentsoldpi.com/v1',
        };
    }

    public function getBaseTokenizerUrl(): string
    {
        return match ($this) {
            Environment::PRODUCTION => 'https://tokens.cs-api.com',
            Environment::SANDBOX    => 'https://tokens-pi.cs-api.com',
        };
    }
}
