<?php

declare(strict_types=1);

namespace CommentSold\Resources;

use CommentSold\Enums\Environment;
use CommentSold\Exception\InvalidArgumentException;

class ClientEnvironment
{
    public function __construct(
        public readonly Environment $environment,
        public ?string $baseUrl = null,
    ) {
        if ($environment == Environment::CUSTOM && ! $baseUrl) {
            throw new InvalidArgumentException('API base URL required for custom environments');
        }

        if ($environment != Environment::CUSTOM) {
            $this->baseUrl = $environment->getBaseAPIUrl();
        }
    }
}
