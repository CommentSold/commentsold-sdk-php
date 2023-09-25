# CommentSold PHP SDK

This SDK can be used to integrate with CommentSold via their RESTful API. Documentation
for the API can be found at https://docs.commentsold.com/api/openapi

## Requirements
PHP 5.6.0 and later.

## Composer
You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require stripe/stripe-php
```

## Getting Started

Before using the SDK you will need to get a `Partner ID` and `Private Key` from [CommentSold](https://commentsold.com).

There are two main sections of the API. There are the global partner functions and then the shop specific functions.
The SDK is broken up to correspond to those two scopes. Both require their own token so be mindful of which you are using where.

The first step for either is to obtain a token. Tokens are typically valid for 24 hours, so you should save them locally and reuse them in order to reduce unnecessary API calls.

Example global scope SDK usage:
```php
$tokenizer = new \CommentSold\Api\Tokenizer('my_private_key');
$token = $tokenizer->getPartnerToken();

$client = new \CommentSold\Api\GlobalClient($token);
$oauthUrl = $client->getOauthUrl(['all'], 'https://my-return-url.com/oauth');
```

Example shop scope SDK usage:
```php
$tokenizer = new \CommentSold\Api\Tokenizer('my_private_key');
$token = $tokenizer->getShopToken('my-shop');

$client = new \CommentSold\Api\ShopClient('my-shop', $token);
$products = $client->getProducts();
```
