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
     * @link https://developers.paystack.co/reference#list-transaction-disputes
     *
     * @return array|Object
     */
    public static function listTransactionDisputes(string $transaction_id)
    {
        $url = "transaction/{$transaction_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $dispute_id
     * @param array $params
     * @link https://developers.paystack.co/reference#add-evidence
     *
     * @return array|Object
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
     * @link https://developers.paystack.co/reference#get-upload-url
     *
     * @return array|Object
     */
    public static function getUploadUrl(string $dispute_id)
    {
        $url = "{$dispute_id}/upload_url";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $dispute_id
     * @param array $params
     * @link https://developers.paystack.co/reference#resolve-dispute
     *
     * @return array|Object
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
     * @link https://developers.paystack.co/reference#export-disputes
     *
     * @return array|Object
     */
    public static function export($params)
    {
        self::validateParams($params);
        $url = static::buildQueryString('export', $params);

        return static::staticRequest('GET', $url);
    }
}
