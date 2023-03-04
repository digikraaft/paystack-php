<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Subscription extends ApiResource
{
    const OBJECT_NAME = 'subscription';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;

    /**
     * @link https://paystack.com/docs/api/#subscription-disable
     * @throws InvalidArgumentException
     */
    public static function disable(?array $params = null): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('disable');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @link https://paystack.com/docs/api/#subscription-enable
     *
     * @throws InvalidArgumentException
     */
    public static function enable(array $params = null): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('enable');

        return static::staticRequest('POST', $url, $params);
    }
}
