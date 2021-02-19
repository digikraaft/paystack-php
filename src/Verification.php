<?php

namespace Digikraaft\Paystack;

class Verification extends ApiResource
{
    const OBJECT_NAME = 'verifications';

    /*
     *
     * @link https://developers.paystack.co/reference#resolve-phone-number
     */
    use ApiOperations\All;

    public static function initiate($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }
}
