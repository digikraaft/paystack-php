<?php

namespace Digikraaft\Paystack;

class BulkCharge extends ApiResource
{
    const OBJECT_NAME = 'bulkcharge';

    use ApiOperations\All;
    use ApiOperations\Fetch;

    /**
     * @param string $reference A reference for this batch.
     * @param array  $params
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @return array | Object
     *
     * @link https://paystack.com/docs/api/#bulk-charge-initiate
     */
    public static function initiate($reference, $params)
    {
        self::validateParams($params, true);
        $url = static::buildQueryString($reference, $params);

        return static::staticRequest('POST', $url);
    }

    /**
     * @param string $id_or_code
     * @param null $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://paystack.com/docs/api/#bulk-charge-fetch-batch
     */
    public static function fetchBulkChargeBatch($id_or_code, $params = null)
    {
        self::validateParams($params);
        $url = "{$id_or_code}";
        $url = static::buildQueryString($url, $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $batch_id_or_code An ID or code for the batch whose charges you want to retrieve.
     * @param array  $params
     *
     * @link https://paystack.com/docs/api/#bulk-charge-fetch-charge
     *
     * @return array | Object
     */
    public static function fetchChargesInABatch($batch_id_or_code, $params = null)
    {
        self::validateParams($params);
        $url = "{$batch_id_or_code}/charges";
        $url = static::buildQueryString($url, $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $batch_code
     *
     * @link https://paystack.com/docs/api/#bulk-charge-pause
     *
     * @return array | Object
     */
    public static function pause($batch_code)
    {
        $url = "pause/{$batch_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $batch_code
     *
     * @link https://paystack.com/docs/api/#bulk-charge-resume
     *
     * @return array|object
     */
    public static function resume($batch_code)
    {
        $url = "resume/{$batch_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }
}
