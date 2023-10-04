<?php

declare(strict_types=1);

namespace CommentSoldTest;

use CommentSold\Enums\Environment;
use CommentSold\Exception\InvalidArgumentException;
use CommentSold\Tokenizer;

class EnvironmentTest extends BaseTestCase
{
    /** @test */
    public function default_tokenizer_environment_is_production()
    {
        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id');
        $this->assertEquals(Environment::PRODUCTION->getBaseTokenizerUrl(), $tokenizer->getBaseUrl());
    }

    /** @test */
    public function set_tokenizer_environment_to_sandbox_works()
    {
        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id');
        $tokenizer->setEnvironment(Environment::SANDBOX);
        $this->assertEquals(Environment::SANDBOX->getBaseTokenizerUrl(), $tokenizer->getBaseUrl());
    }

    /** @test */
    public function set_tokenizer_environment_to_custom_works()
    {
        $baseUrl = 'https://local.tokenizer.test';

        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id');
        $tokenizer->setEnvironment(Environment::CUSTOM, $baseUrl);
        $this->assertEquals($baseUrl, $tokenizer->getBaseUrl());
    }

    /** @test */
    public function set_tokenizer_environment_to_custom_fails_if_no_base_url()
    {
        $this->expectException(InvalidArgumentException::class);

        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id');
        $tokenizer->setEnvironment(Environment::CUSTOM);
    }
}
