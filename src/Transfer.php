<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Transfer extends ApiResource
{
    const OBJECT_NAME = 'transfer';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     *
     * @link https://paystack.com/docs/api/#transfer-initiate
     *
     * @throws InvalidArgumentException
     */
    public static function initiate(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @link https://paystack.com/docs/api/#transfer-verify
     *
     * @throws InvalidArgumentException
     */
    public static function verify(string $reference): array|object
    {
        $url = "verify/{$reference}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#transfer-finalize
     *
     * @throws InvalidArgumentException
     */
    public static function finalize(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('finalize_transfer');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @link https://paystack.com/docs/api/#transfer-bulk
     *
     */
    public static function initiateBulkTransfer(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('bulk');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @link https://developers.paystack.co/reference#resend-otp-for-transfer
     *
     */
    public static function resendOtp(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::classUrl().'/resend_otp';

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://developers.paystack.co/reference#disable-otp-requirement-for-transfers
     *
     * @throws InvalidArgumentException
     */
    public static function disableOtp(?array $params = null): array|object
    {
        self::validateParams($params);
        $url = static::endPointUrl('resend_otp');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *@link https://developers.paystack.co/reference#finalize-disabling-of-otp-requirement-for-transfers
     *
     */
    public static function disableOtpFinalize(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('disable_otp_finalize');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://developers.paystack.co/reference#enable-otp-requirement-for-transfers
     *
     * @throws InvalidArgumentException
     */
    public static function enableOtp(?array $params = null): array|object
    {
        self::validateParams($params);
        $url = static::endPointUrl('enable_otp');

        return static::staticRequest('POST', $url, $params);
    }
}
