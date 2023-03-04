<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Integration extends ApiResource
{
    const OBJECT_NAME = 'integration';

    /**
     * Paystack Documentation Reference.
     *
     * @link https://paystack.com/docs/api/#control-panel-fetch-timeout
     *
     * @throws InvalidArgumentException
     */
    public static function fetchPaymentSessionTimeout(): array|object
    {
        $url = static::endPointUrl('payment_session_timeout');

        return static::staticRequest('GET', $url);
    }

    /**
     * @param $params the time before stopping session (in seconds). Set to 0 to cancel session timeouts
     * Paystack Documentation Reference
     *
     * @throws InvalidArgumentException
     * @link https://paystack.com/docs/api/#control-panel-update-timeout
     *
     */
    public static function updatePaymentSessionTimeout($params): array|object
    {
        self::validateParams($params);
        $url = static::endPointUrl('payment_session_timeout');

        return static::staticRequest('PUT', $url);
    }
}
