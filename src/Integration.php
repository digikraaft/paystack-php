<?php


namespace Digikraaft\Paystack;

class Integration extends ApiResource
{
    const OBJECT_NAME = 'integration';

    /**
     * Paystack Documentation Reference
     * @link https://developers.paystack.co/reference#fetch-payment-session-timeout
     *
     * @return array|Object
     */
    public static function fetchPaymentSessionTimeout()
    {
        $url = static::endPointUrl('payment_session_timeout');

        return static::staticRequest('GET', $url);
    }

    /**
     * @param $params the time before stopping session (in seconds). Set to 0 to cancel session timeouts
     * Paystack Documentation Reference
     * @link https://developers.paystack.co/reference#update-payment-session-timeout
     *
     * @return array|Object
     */
    public static function updatePaymentSessionTimeout($params)
    {
        self::validateParams($params);
        $url = static::endPointUrl('payment_session_timeout');

        return static::staticRequest('PUT', $url);
    }
}
