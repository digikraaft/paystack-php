<?php

namespace Digikraaft\Paystack;

class Subscription extends ApiResource
{
    const OBJECT_NAME = 'subscription';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;

    /**
     * @param array $params details at
     *
     * @link https://paystack.com/docs/api/#subscription-disable
     *
     * @return array|object
     */
    public static function disable($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('disable');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://paystack.com/docs/api/#subscription-enable
     *
     * @return array|object
     */
    public static function enable($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('enable');

        return static::staticRequest('POST', $url, $params);
    }
}
