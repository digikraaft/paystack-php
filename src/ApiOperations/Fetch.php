<?php

namespace Digikraaft\Paystack\ApiOperations;

trait Fetch
{

    public static function fetch(string $id): array|object
    {
        $url = static::resourceUrl($id);

        return static::staticRequest('GET', $url);
    }
}
