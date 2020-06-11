<?php


namespace Digikraaft\Paystack;

class BulkCharge extends ApiResource
{
    const OBJECT_NAME = 'bulkcharge';

    use ApiOperations\All;
    use ApiOperations\Fetch;


    /**
     * @param string $reference A reference for this batch.
     * @param array $params
     * @return array | Object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     *
     * @link https://developers.paystack.co/reference#initiate-bulk-charge
     */
    public static function initiate($reference, $params)
    {
        self::validateParams($params, true);
        $url = static::buildQueryString($reference, $params);

        return static::staticRequest('POST', $url);
    }

    /**
     * @param string $batch_id_or_code An ID or code for the batch whose charges you want to retrieve.
     * @param array $params
     * @link https://developers.paystack.co/reference#fetch-charges-in-a-batch
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
     * @link https://developers.paystack.co/reference#pause-bulk-charge-batch
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
     * @link https://developers.paystack.co/reference#resume-bulk-charge-batch
     *
     * @return array|Object
     */
    public static function resume($batch_code)
    {
        $url = "resume/{$batch_code}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }
}
