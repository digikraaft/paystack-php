<?php


namespace Digikraaft\Paystack;

class Transaction extends ApiResource
{
    const OBJECT_NAME = 'transaction';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     * @param array $params details at
     * @link https://developers.paystack.co/reference#initialize-a-transaction
     *
     * @return array|Object
     */
    public static function initialize($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('initialize');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $reference details at
     * @link https://developers.paystack.co/reference#verify-transaction
     * @return array|Object
     */
    public static function verify($reference)
    {
        $url = "verify/{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params details of parameter content at
     * @link https://developers.paystack.co/reference#charge-authorization
     * @return array|Object
     */
    public static function chargeAuthorization($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('charge_authorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $transaction_id details at
     * @link https://developers.paystack.co/reference#view-transaction-timeline
     * @return array|Object
     */
    public static function timeline($transaction_id)
    {
        $url = static::resourceUrl($transaction_id);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params details at
     * @link https://developers.paystack.co/reference#transaction-totals
     * @return array|Object
     */
    public static function totals($params)
    {
        self::validateParams($params, true);
        $url = static::buildQueryString('totals', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params details at
     * @link https://developers.paystack.co/reference#export-transactions
     * @return array|Object
     */
    public static function export($params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('export', $params);

        return static::staticRequest('get', $url, $params);
    }

    /**
     * @param array $params details at
     * @link https://developers.paystack.co/reference#request-reauthorization
     * @return array|Object
     */
    public static function requestReauthorization($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('request_reauthorization');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     * @link https://developers.paystack.co/reference#partial-debit
     * @return array|Object
     */
    public static function partialDebit($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('partial_debit');

        return static::staticRequest('POST', $url, $params);
    }
}
