<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Balance extends ApiResource
{
    const OBJECT_NAME = 'balance';

    use ApiOperations\All;

    /**
     *
     * @param array|null $params
     * @return array|object
     * @throws InvalidArgumentException
     * @link https://developers.paystack.co/reference#fetch-balance-history
     */
    public static function ledger(?array $params = null): array|object
    {
        self::validateParams($params);
        $url = self::buildQueryString('ledger', $params);

        return static::staticRequest('GET', $url);
    }
}
