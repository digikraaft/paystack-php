<?php

namespace Digikraaft\Paystack\Util;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;
use stdClass;

abstract class Util
{
    private static $isMbstringAvailable = null;
    private static $isHashEqualsAvailable = null;


    public static function utf8(mixed $value): mixed
    {
        if (null === self::$isMbstringAvailable) {
            self::$isMbstringAvailable = function_exists('mb_detect_encoding');

            if (! self::$isMbstringAvailable) {
                trigger_error('It looks like the mbstring extension is not enabled. '.
                    'UTF-8 strings will not properly be encoded. Ask your system '.
                    'administrator to enable the mbstring extension.', E_USER_WARNING);
            }
        }

        if (is_string($value) && self::$isMbstringAvailable && 'UTF-8' !== mb_detect_encoding($value, 'UTF-8', true)) {
            return utf8_encode($value);
        }

        return $value;
    }

    /**
     * Converts a response from the Paystack API to the corresponding PHP object.
     */
    public static function convertArrayToObject(array $resp): array|object
    {

        $object = new stdClass();

        return self::arrayToObject($resp, $object);
    }

    private static function arrayToObject($array, &$obj): object
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $obj->$key = new stdClass();
                self::arrayToObject($value, $obj->$key);
            } else {
                $obj->$key = $value;
            }
        }

        return $obj;
    }
}
