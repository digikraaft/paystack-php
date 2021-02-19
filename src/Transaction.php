<?php

namespace Digikraaft\Paystack;

class Transaction extends ApiResource
{
    const OBJECT_NAME = 'transaction';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     * @param array $params details at
     *
     * @link https://paystack.com/docs/api/#transaction-initialize
     *
     * @return array|object
     */
    public static function initialize($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('initialize');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $reference details at
     *
     * @link https://paystack.com/docs/api/#transaction-verify
     *
     * @return array|object
     */
    public static function verify($reference)
    {
        $url = "verify/{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params details of parameter content at
     *
     * @link https://paystack.com/docs/api/#transaction-charge-authorization
     *
     * @return array|object
     */
    public static function chargeAuthorization($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('charge_authorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details of parameter content at
     *
     * @link https://paystack.com/docs/api/#transaction-check-authorization
     *
     * @return array|object
     */
    public static function checkAuthorization($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('check_authorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $transaction_id details at
     *
     * @link https://paystack.com/docs/api/#transaction-view-timeline
     *
     * @return array|object
     */
    public static function timeline($transaction_id)
    {
        $url = static::resourceUrl($transaction_id);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params details at
     *
     * @link https://paystack.com/docs/api/#transaction-totals
     *
     * @return array|object
     */
    public static function totals($params)
    {
        self::validateParams($params, true);
        $url = static::buildQueryString('totals', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params details at
     *
     * @link https://paystack.com/docs/api/#transaction-export
     *
     * @return array|object
     */
    public static function export($params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('export', $params);

        return static::staticRequest('get', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#request-reauthorization
     *
     * @return array|object
     */
    public static function requestReauthorization($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('request_reauthorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://paystack.com/docs/api/#transaction-partial-debit
     *
     * @return array|object
     */
    public static function partialDebit($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('partial_debit');

        return static::staticRequest('POST', $url, $params);
    }
}
