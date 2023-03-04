<?php

namespace Digikraaft\Paystack\ApiOperations;

trait Update
{

    public static function update(string $id, array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::resourceUrl($id);

        return static::staticRequest('PUT', $url, $params);
    }
}
