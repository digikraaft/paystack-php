<?php


namespace Digikraaft\Paystack\ApiOperations;

trait Create
{
    /**
     * @param array $params
     *
     * @return array|Object
     */
    public static function create($params)
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }
}
