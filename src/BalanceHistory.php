<?php

namespace Digikraaft\Paystack;

class BalanceHistory extends ApiResource
{
    const OBJECT_NAME = 'balance';

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     *
     * @link https://developers.paystack.co/reference#fetch-balance-history
     */
    public static function ledger(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::classUrl().'/ledger';

        return static::staticRequest('get', $url);
    }
}
