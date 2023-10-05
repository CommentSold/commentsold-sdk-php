<?php

declare(strict_types=1);

namespace CommentSoldTest;

use CommentSold\Enums\Environment;
use CommentSold\Exception\InvalidArgumentException;
use CommentSold\GlobalClient;
use CommentSold\Resources\ClientEnvironment;
use CommentSold\Resources\TokenizerEnvironment;
use CommentSold\ShopClient;
use CommentSold\Tokenizer;

class EnvironmentTest extends BaseTestCase
{
    /** @test */
    public function default_tokenizer_environment_is_sandbox()
    {
        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id');
        $this->assertEquals(Environment::SANDBOX->getBaseTokenizerUrl(), $tokenizer->getBaseUrl());
    }

    /** @test */
    public function set_tokenizer_environment_to_production_works()
    {
        $environment = new TokenizerEnvironment(Environment::PRODUCTION);

        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id', $environment);
        $this->assertEquals(Environment::PRODUCTION->getBaseTokenizerUrl(), $tokenizer->getBaseUrl());
    }

    /** @test */
    public function set_tokenizer_environment_to_custom_works()
    {
        $baseUrl = 'https://local.tokenizer.test/';
        $environment = new TokenizerEnvironment(Environment::CUSTOM, $baseUrl);

        $tokenizer = new Tokenizer('my_private_key', 'my_partner_id', $environment);
        $this->assertEquals($baseUrl, $tokenizer->getBaseUrl());
    }

    /** @test */
    public function set_tokenizer_environment_to_custom_fails_if_no_base_url()
    {
        $this->expectException(InvalidArgumentException::class);

        $environment = new TokenizerEnvironment(Environment::CUSTOM);
    }

    /** @test */
    public function default_global_client_environment_is_sandbox()
    {
        $client = new GlobalClient('token');
        $this->assertEquals(Environment::SANDBOX->getBaseAPIUrl(), $client->getBaseUrl());
    }

    /** @test */
    public function set_global_client_environment_to_production_works()
    {
        $environment = new ClientEnvironment(Environment::PRODUCTION);

        $client = new GlobalClient('token', $environment);
        $this->assertEquals(Environment::PRODUCTION->getBaseAPIUrl(), $client->getBaseUrl());
    }

    /** @test */
    public function set_global_client_environment_to_custom_works()
    {
        $baseUrl = 'https://local.tokenizer.test/';
        $environment = new ClientEnvironment(Environment::CUSTOM, $baseUrl);

        $client = new GlobalClient('token', $environment);
        $this->assertEquals($baseUrl, $client->getBaseUrl());
    }

    /** @test */
    public function set_client_environment_to_custom_fails_if_no_base_url()
    {
        $this->expectException(InvalidArgumentException::class);

        $environment = new ClientEnvironment(Environment::CUSTOM);
    }

    /** @test */
    public function default_shop_client_environment_is_sandbox()
    {
        $client = new ShopClient('shop', 'token');
        $this->assertEquals(Environment::SANDBOX->getBaseAPIUrl(), $client->getBaseUrl());
    }

    /** @test */
    public function set_shop_client_environment_to_production_works()
    {
        $environment = new ClientEnvironment(Environment::PRODUCTION);

        $client = new ShopClient('shop', 'token', $environment);
        $this->assertEquals(Environment::PRODUCTION->getBaseAPIUrl(), $client->getBaseUrl());
    }

    /** @test */
    public function set_shop_client_environment_to_custom_works()
    {
        $baseUrl = 'https://local.tokenizer.test/';
        $environment = new ClientEnvironment(Environment::CUSTOM, $baseUrl);

        $client = new ShopClient('shop', 'token', $environment);
        $this->assertEquals($baseUrl, $client->getBaseUrl());
    }
}
