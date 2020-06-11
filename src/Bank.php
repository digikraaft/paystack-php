<?php


namespace Digikraaft\Paystack;

class Bank extends ApiResource
{
    use ApiOperations\All;

    /**
     * @param string $bvn
     * @link https://developers.paystack.co/reference#resolve-bvn
     *
     * @return array|Object
     */
    public static function resolveBvn(string $bvn)
    {
        $url = "resolve_bvn/{$bvn}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bvn
     * @param array $params
     * @link https://developers.paystack.co/reference#match-bvn
     *
     * @return array|Object
     */
    public static function bvnMatch($params)
    {
        self::validateParams($params);
        $url = urlencode('bvn/match');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     * @link https://developers.paystack.co/reference#resolve-account-number
     *
     * @return array|Object
     */
    public static function resolveAccountNumber($params)
    {
        self::validateParams($params, true);
        $url = static::buildQueryString('resolve', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $bin
     * @link https://developers.paystack.co/reference#resolve-card-bin
     *
     * @return array|Object
     */
    public static function resolveCardBin(string $bin)
    {
        $url = "decision/bin/{$bin}";

        return static::staticRequest('GET', $url);
    }
}
