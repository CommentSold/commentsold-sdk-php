<?php

declare(strict_types=1);

namespace CommentSold\Resources\Response\Customer;

use CommentSold\Resources\AbstractResource;

class CustomerCollection extends AbstractResource
{
    /** @var array[Customer] */
    public array $customers;

    public function __construct(?array $payload = [])
    {
        $array = [];
        foreach ($payload as $item) {
            $array[] = new Customer($item);
        }

        $this->customers = $array;
    }
}
