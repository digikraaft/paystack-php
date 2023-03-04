<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Transaction extends ApiResource
{
    const OBJECT_NAME = 'transaction';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     *
     * @link https://paystack.com/docs/api/#transaction-initialize
     * @throws InvalidArgumentException
     */
    public static function initialize(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('initialize');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#transaction-verify
     *
     * @throws InvalidArgumentException
     */
    public static function verify(string $reference): array|object
    {
        $url = "verify/{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#transaction-charge-authorization
     *
     * @throws InvalidArgumentException
     */
    public static function chargeAuthorization(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('charge_authorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#transaction-check-authorization
     * @throws InvalidArgumentException
     */
    public static function checkAuthorization(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('check_authorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @link https://paystack.com/docs/api/#transaction-view-timeline
     *
     * @throws InvalidArgumentException
     */
    public static function timeline(string $transaction_id): array|object
    {
        $url = static::resourceUrl($transaction_id);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#transaction-totals
     *
     */
    public static function totals(?array $params = null): array|object
    {
        self::validateParams($params, true);
        $url = static::buildQueryString('totals', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @throws InvalidArgumentException
     * @link https://paystack.com/docs/api/#transaction-export
     *
     */
    public static function export(array $params): array|object
    {
        self::validateParams($params);
        $url = static::buildQueryString('export', $params);

        return static::staticRequest('get', $url, $params);
    }

    /**
     * @link https://developers.paystack.co/reference#request-reauthorization
     *
     * @throws InvalidArgumentException
     */
    public static function requestReauthorization(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('request_reauthorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#transaction-partial-debit
     *
     * @throws InvalidArgumentException
     */
    public static function partialDebit(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('partial_debit');

        return static::staticRequest('POST', $url, $params);
    }
}
