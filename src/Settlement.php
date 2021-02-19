<?php

namespace Digikraaft\Paystack;

class Settlement extends ApiResource
{
    const OBJECT_NAME = 'settlement';

    use ApiOperations\All;

    /**
     * @param string $settlement_id
     * @param array  $params
     *
     * @link https://paystack.com/docs/api/#settlement-transactions
     *
     * @return array|object
     */
    public static function fetchSettlementTransactions($settlement_id, $params)
    {
        self::validateParams($params);
        $url = "{$settlement_id}/transactions";
        $url = static::buildQueryString($url, $params);

        return static::staticRequest('GET', $url);
    }
}
