<?php

namespace Digikraaft\Paystack\ApiOperations;

trait Create
{

    public static function create($params): array|object
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }
}
