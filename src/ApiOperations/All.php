<?php

namespace Digikraaft\Paystack\ApiOperations;

trait All
{

    public static function list($params = null): array|object
    {
        self::validateParams($params);
        $url = static::classUrl();
        if (! empty($params)) {
            $url .= '?'.http_build_query($params);
        }

        return static::staticRequest('GET', $url);
    }
}
