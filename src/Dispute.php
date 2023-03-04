<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Dispute extends ApiResource
{
    const OBJECT_NAME = 'dispute';

    use ApiOperations\All;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     *
     * @link https://paystack.com/docs/api/#dispute-transaction
     */
    public static function listTransactionDisputes(string $transaction_id): array|object
    {
        $url = "transaction/{$transaction_id}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#dispute-evidence
     * @throws InvalidArgumentException
     */
    public static function addEvidence(string $dispute_id, array $params): array|object
    {
        self::validateParams($params, true);
        $url = "{$dispute_id}/evidence";
        $url = static::endPointUrl($url);

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#dispute-upload-url
     * @throws InvalidArgumentException
     */
    public static function getUploadUrl(string $dispute_id): array|object
    {
        $url = "{$dispute_id}/upload_url";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#dispute-resolve
     *
     * @throws InvalidArgumentException
     */
    public static function resolve(string $dispute_id, array $params): array|object
    {
        self::validateParams($params, true);
        $url = "{$dispute_id}/resolve";
        $url = static::endPointUrl($url);

        return static::staticRequest('PUT', $url, $params);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#dispute-export
     *
     * @throws InvalidArgumentException
     */
    public static function export(array $params): array|object
    {
        self::validateParams($params);
        $url = static::buildQueryString('export', $params);

        return static::staticRequest('GET', $url);
    }
}
