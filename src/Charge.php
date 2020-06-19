<?php

namespace Digikraaft\Paystack;

class Charge extends ApiResource
{
    const OBJECT_NAME = 'charge';

    /**
     * Paystack Documentation Reference.
     *
     * @link https://developers.paystack.co/reference#charge
     */
    use ApiOperations\Create;
    use ApiOperations\Fetch;

    /**
     * @param array $params
     *
     * @link https://developers.paystack.co/reference#submit-pin
     *
     * @return array|object
     */
    public static function submitPin($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_pin');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://developers.paystack.co/reference#submit-otp
     *
     * @return array|object
     */
    public static function submitOtp($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_otp');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://developers.paystack.co/reference#submit-phone
     *
     * @return array|object
     */
    public static function submitPhone($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_phone');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params dates in the format 2016-09-21
     *
     * @link https://developers.paystack.co/reference#submit-birthday
     *
     * @return array|object
     */
    public static function submitBirthday($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_birthday');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $reference Charge reference to check
     *
     * @link https://developers.paystack.co/reference#check-pending-charge
     *
     * @return array|object
     */
    public static function checkPending($reference)
    {
        $url = "{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }
}
