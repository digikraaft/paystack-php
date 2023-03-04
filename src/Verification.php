<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Verification extends ApiResource
{
    const OBJECT_NAME = 'verifications';

    /*
     *
     * @link https://developers.paystack.co/reference#resolve-phone-number
     */
    use ApiOperations\All;

    /**
     * @throws InvalidArgumentException
     */
    public static function initiate(array $params): array|object
    {
        self::validateParams($params, true);
        $url = static::classUrl();

        return static::staticRequest('POST', $url, $params);
    }
}
