<?php

namespace Digikraaft\Paystack;

class BalanceHistory extends ApiResource
{
    const OBJECT_NAME = 'balance';

    /**
     * @param array $params
     *
     * @throws Exceptions\InvalidArgumentException
     *
     * @return array|object
     *
     * @link https://developers.paystack.co/reference#fetch-balance-history
     */
    public static function ledger($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl().'/ledger';

        return static::staticRequest('get', $url);
    }
}
