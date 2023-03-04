<?php

namespace Digikraaft\Paystack;

class Invoice extends ApiResource
{
    const OBJECT_NAME = 'paymentrequest';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     *
     * @link https://paystack.com/docs/api/#invoice-verify
     *
     */
    public static function verify(string $invoice_code): array|object
    {
        $url = "verify/{$invoice_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     *
     * @link https://paystack.com/docs/api/#invoice-send-notification
     */
    public static function notify(string $invoice_id, array $params): array|object
    {
        $url = "notify/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * Get invoice totals for dashboard.
     *
     *
     * @throws Exceptions\InvalidArgumentException
     *
     */
    public static function totals(): array|object
    {
        $url = static::endPointUrl('totals');

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     *
     * @link https://paystack.com/docs/api/#invoice-finalize
     */
    public static function finalize(string $invoice_id, ?array $params = null): array|object
    {
        self::validateParams($params);
        $url = "finalize/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     *
     * @link https://paystack.com/docs/api/#invoice-archive
     */
    public static function archive(string $invoice_id, ?array $params = null): array|object
    {
        self::validateParams($params);

        $url = "archive/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     *
     * @link https://developers.paystack.co/reference#mark_as_paid
     */
    public static function markAsPaid(string $invoice_id, ?array $params = null): array|object
    {
        self::validateParams($params, true);
        $url = "mark_as_paid/{$invoice_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url);
    }
}
