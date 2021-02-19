<?php

namespace Digikraaft\Paystack;

class Bank extends ApiResource
{
    use ApiOperations\All;

    /**
     * @param string $bvn
     *
     * @link https://paystack.com/docs/api/#verification-resolve-bvn
     *
     * @return array|object
     */
    public static function resolveBvn(string $bvn)
    {
        $url = "resolve_bvn/{$bvn}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bvn
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://paystack.com/docs/api/#verification-resolve-bvn-premium
     */
    public static function resolveBvnPremium(string $bvn)
    {
        $url = "identity/bvn/resolve/{$bvn}";

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     *
     * @link https://paystack.com/docs/api/#verification-match-bvn
     *
     * @return array|object
     */
    public static function bvnMatch($params)
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
