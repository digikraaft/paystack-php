<?php

namespace Digikraaft\Paystack;

class Transfer extends ApiResource
{
    const OBJECT_NAME = 'transfer';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     * @param array $params
     *
     * @link https://paystack.com/docs/api/#transfer-initiate
     *
     * @return array|object
     */
    public static function initiate($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $reference Transfer reference. Details at
     *
     * @link https://paystack.com/docs/api/#transfer-verify
     *
     * @return array|object
     */
    public static function verify($reference)
    {
        $url = "verify/{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     *
     * @link https://paystack.com/docs/api/#transfer-finalize
     *
     * @return array|object
     */
    public static function finalize($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('finalize_transfer');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://paystack.com/docs/api/#transfer-bulk
     *
     * @return array|object
     */
    public static function initiateBulkTransfer($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('bulk');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#resend-otp-for-transfer
     *
     * @return array|object
     */
    public static function resendOtp($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl().'/resend_otp';

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param null|array $params details at
     *
     * @link https://developers.paystack.co/reference#disable-otp-requirement-for-transfers
     *
     * @return array|object
     */
    public static function disableOtp($params = null)
    {
        self::validateParams($params);
        $url = static::endPointUrl('resend_otp');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#finalize-disabling-of-otp-requirement-for-transfers
     *
     * @return array|object
     */
    public static function disableOtpFinalize($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('disable_otp_finalize');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params details at
     *
     * @link https://developers.paystack.co/reference#enable-otp-requirement-for-transfers
     *
     * @return array|object
     */
    public static function enableOtp($params = null)
    {
        self::validateParams($params);
        $url = static::endPointUrl('enable_otp');

        return static::staticRequest('POST', $url, $params);
    }
}
