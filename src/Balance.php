<?php

namespace Digikraaft\Paystack;

class Balance extends ApiResource
{
    const OBJECT_NAME = 'balance';

    use ApiOperations\All;

    /**
     * @param array $params
     *
     * @throws Exceptions\InvalidArgumentException|Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://developers.paystack.co/reference#fetch-balance-history
     *
     * @returns array|Object
     */
    public static function ledger($params = null)
    {
        self::validateParams($params);
        $url = self::buildQueryString('ledger', $params);

        return static::staticRequest('GET', $url);
    }
}
