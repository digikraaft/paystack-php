<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Bank extends ApiResource
{
    const OBJECT_NAME = 'bank';

    use ApiOperations\All;

    /**
     *
     * @throws InvalidArgumentException
     * @link https://paystack.com/docs/api/#verification-resolve-bvn
     */
    public static function resolveBvn(string $bvn): array|object
    {
        $url = "resolve_bvn/{$bvn}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     * @link https://paystack.com/docs/api/#verification-resolve-bvn-premium
     */
    public static function resolveBvnPremium(string $bvn): array|object
    {
        $url = "identity/bvn/resolve/{$bvn}";

        return static::staticRequest('GET', $url);
    }

    /**
     * @link https://paystack.com/docs/api/#verification-match-bvn
     *
     */
    public static function bvnMatch(array $params): array|object
    {
        self::validateParams($params);
        $url = urlencode('bvn/match');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @link https://paystack.com/docs/api/#verification-resolve-account
     *
     * @return array|object
     */
    public static function resolveAccountNumber($params)
    {
        self::validateParams($params, true);
        $url = static::buildQueryString('resolve', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bin
     *
     * @link https://paystack.com/docs/api/#verification-resolve-card
     *
     * @return array|object
     */
    public static function resolveCardBin(string $bin)
    {
        $url = "decision/bin/{$bin}";

        return static::staticRequest('GET', $url);
    }
}
