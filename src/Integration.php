<?php

namespace Digikraaft\Paystack;

class Integration extends ApiResource
{
    const OBJECT_NAME = 'integration';

    /**
     * Paystack Documentation Reference.
     *
     * @link https://paystack.com/docs/api/#control-panel-fetch-timeout
     *
     * @return array|object
     */
    public static function fetchPaymentSessionTimeout()
    {
        $url = static::endPointUrl('payment_session_timeout');

        return static::staticRequest('GET', $url);
    }

    /**
     * @param $params the time before stopping session (in seconds). Set to 0 to cancel session timeouts
     * Paystack Documentation Reference
     *
     * @link https://paystack.com/docs/api/#control-panel-update-timeout
     *
     * @return array|object
     */
    public static function updatePaymentSessionTimeout($params)
    {
        self::validateParams($params);
        $url = static::endPointUrl('payment_session_timeout');

        return static::staticRequest('PUT', $url);
    }
}
