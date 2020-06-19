<?php

namespace Digikraaft\Paystack;

class Invoice extends ApiResource
{
    const OBJECT_NAME = 'paymentrequest';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     * @param string $invoice_code details at
     *
     * @link https://developers.paystack.co/reference#verify-invoice
     *
     * @return array|object
     */
    public static function verify(string $invoice_code)
    {
        $url = "verify/{$invoice_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $invoice_id details at
     * @param $params
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://developers.paystack.co/reference#send-notification
     */
    public static function notify(string $invoice_id, $params)
    {
        $url = "notify/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * Get invoice totals for dashboard.
     *
     * @link https://developers.paystack.co/reference#get-invoice-metrics-for-dashboard
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @return array|object
     */
    public static function totals()
    {
        $url = static::endPointUrl('totals');

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $invoice_id
     * @param array  $params
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://developers.paystack.co/reference#finalize-a-draft-invoice
     */
    public static function finalize($invoice_id, $params = null)
    {
        self::validateParams($params);
        $url = "finalize/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string     $invoice_id
     * @param null|array $params
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://developers.paystack.co/reference#archive-invoice
     */
    public static function archive($invoice_id, $params)
    {
        self::validateParams($params);

        $url = "archive/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $invoice_id
     * @param array  $params
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://developers.paystack.co/reference#mark_as_paid
     */
    public static function markAsPaid($invoice_id, $params)
    {
        self::validateParams($params, true);
        $url = "mark_as_paid/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url);
    }
}
