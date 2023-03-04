<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Settlement extends ApiResource
{
    const OBJECT_NAME = 'settlement';

    use ApiOperations\All;

    /**
     *
     * @link https://paystack.com/docs/api/#settlement-transactions
     * @throws InvalidArgumentException
     */
    public static function fetchSettlementTransactions(string $settlement_id, ?array $params = null): array|object
    {
        self::validateParams($params);
        $url = "{$settlement_id}/transactions";
        $url = static::buildQueryString($url, $params);

        return static::staticRequest('GET', $url);
    }
}
