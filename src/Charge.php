<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

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
     * @throws InvalidArgumentException
     * @link https://paystack.com/docs/api/#charge-submit-pin
     *
     */
    public static function submitPin(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_pin');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#charge-submit-otp
     */
    public static function submitOtp(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_otp');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#charge-submit-phone
     *
     */
    public static function submitPhone(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_phone');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * dates in the format 2016-09-21
     *
     * @link https://paystack.com/docs/api/#charge-submit-birthday
     * @throws InvalidArgumentException
     */
    public static function submitBirthday(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_birthday');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @link https://paystack.com/docs/api/#charge-submit-address
     *
     */
    public static function submitAddress(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('submit_address');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#charge-check

     */
    public static function checkPending(string $reference): array|object
    {
        $url = "{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }
}
