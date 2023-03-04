<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class BulkCharge extends ApiResource
{
    const OBJECT_NAME = 'bulkcharge';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     * @link https://paystack.com/docs/api/#bulk-charge-initiate
     */
    public static function initiate(string $reference, array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::buildQueryString($reference, $params);

        return static::staticRequest('POST', $url);
    }

    /**
     * @throws Exceptions\InvalidArgumentException
     * @link https://paystack.com/docs/api/#bulk-charge-fetch-batch
     */
    public static function fetchBulkChargeBatch(string $id_or_code, ?array $params = null): array|object
    {
        self::validateParams($params);
        $url = "{$id_or_code}";
        $url = static::buildQueryString($url, $params);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#bulk-charge-fetch-charge
     *
     * @throws InvalidArgumentException
     */
    public static function fetchChargesInABatch(string $batch_id_or_code, array $params = null): array|object
    {
        self::validateParams($params);
        $url = "{$batch_id_or_code}/charges";
        $url = static::buildQueryString($url, $params);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#bulk-charge-pause
     * @throws InvalidArgumentException
     */
    public static function pause(string $batch_code): array|object
    {
        $url = "pause/{$batch_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#bulk-charge-resume
     * @throws InvalidArgumentException
     */
    public static function resume(string $batch_code): array|object
    {
        $url = "resume/{$batch_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }
}
