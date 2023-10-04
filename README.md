# CommentSold PHP SDK

This SDK can be used to integrate with CommentSold via their RESTful API. Documentation
for the API can be found at https://docs.commentsold.com/api/openapi

## Requirements
PHP 8.1 and later.

## Composer
You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require commentsold/commentsold-sdk-php
```

## Getting Started

Before using the SDK you will need to get a `Partner ID` and `Private Key` from [CommentSold](https://commentsold.com).

There are two main sections of the API. There are the global partner functions and then the shop specific functions.
The SDK is broken up to correspond to those two scopes. Both require their own token, so be mindful of which you are using where.

The first step for either is to obtain a token. Tokens are valid for 24 hours, so you should save them locally and reuse them in order to reduce unnecessary API calls.

Example global scope SDK usage:

```php
require __DIR__.'/vendor/autoload.php';

$tokenizer = new CommentSold\Tokenizer('my_private_key', 'my_partner_id');
$token = $tokenizer->getPartnerToken();

$client = new CommentSold\GlobalClient($token);
$api = new CommentSold\Services\AccountApi($client);
$request = new CommentSold\Resources\Request\Account\GetOauthUrlRequest(['all'], 'https://my-return-url.com/oauth');
$oauthUrl = $api->getOauthUrl($request);
```

Example shop scope SDK usage:

```php
require __DIR__.'/vendor/autoload.php';

$tokenizer = new CommentSold\Tokenizer('my_private_key', 'my_partner_id');
$token = $tokenizer->getShopToken('my-shop');

$client = new CommentSold\ShopClient('my-shop', $token);
$api = new CommentSold\Services\ProductApi($client);
$request = new CommentSold\Resources\Request\Product\GetProductsRequest();

// raw response object
$response = $api->getProducts($request);
// the response data object (in this case an array of product objects)
$products = $response->getData();
// if you would rather work with the response as an array
$productsAsArray = $response->getData()->toArray();

// the pagination detail object
$pagination = $response->getPagination();
// the total number of results
$totalCount = $pagination->total;

```

Example using the sandbox for testing:

```php
require __DIR__.'/vendor/autoload.php';

$tokenizer = new CommentSold\Tokenizer('my_private_key', 'my_partner_id');
$tokenizer->setEnvironment(CommentSold\Enums\Environment::SANDBOX);
$token = $tokenizer->getPartnerToken();

$client = new CommentSold\GlobalClient($token);
$client->setEnvironment(CommentSold\Enums\Environment::SANDBOX);
$api = new CommentSold\Services\AccountApi($client);
$request = new CommentSold\Resources\Request\Account\GetOauthUrlRequest(['all'], 'https://my-return-url.com/oauth');
$oauthUrl = $api->getOauthUrl($request);
```