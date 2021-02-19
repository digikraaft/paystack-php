<?php

namespace Digikraaft\Paystack;

class Dispute extends ApiResource
{
    const OBJECT_NAME = 'dispute';

    use ApiOperations\All;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     * @param string $transaction_id
     *
     * @link https://paystack.com/docs/api/#dispute-transaction
     *
     * @return array|object
     */
    public static function listTransactionDisputes(string $transaction_id)
    {
        $url = "transaction/{$transaction_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $dispute_id
     * @param array  $params
     *
     * @link https://paystack.com/docs/api/#dispute-evidence
     *
     * @return array|object
     */
    public static function addEvidence(string $dispute_id, $params)
    {
        self::validateParams($params, true);
        $url = "{$dispute_id}/evidence";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param string $dispute_id
     *
     * @link https://paystack.com/docs/api/#dispute-upload-url
     *
     * @return array|object
     */
    public static function getUploadUrl(string $dispute_id)
    {
        $url = "{$dispute_id}/upload_url";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $dispute_id
     * @param array  $params
     *
     * @link https://paystack.com/docs/api/#dispute-resolve
     *
     * @return array|object
     */
    public static function resolve(string $dispute_id, $params)
    {
        self::validateParams($params, true);
        $url = "{$dispute_id}/resolve";
        $url = static::endPointUrl($url);

        return static::staticRequest('PUT', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://paystack.com/docs/api/#dispute-export
     *
     * @return array|object
     */
    public static function export($params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('export', $params);

        return static::staticRequest('GET', $url);
    }
}
