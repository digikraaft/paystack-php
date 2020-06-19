<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class Paystack
{
    /** @var string The Paystack API key to be used for requests. */
    public static string $apiKey;

    /** @var string The instance API key, settable once per new instance */
    private $instanceApiKey;

    /** @var string The base URL for the Paystack API. */
    public static $apiBase = 'https://api.paystack.co';

    /**
     * @return string the API key used for requests
     */
    public static function getApiKey(): string
    {
        return self::$apiKey;
    }

    /**
     * Sets the API key to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey): void
    {
        self::validateApiKey($apiKey);
        self::$apiKey = $apiKey;
    }

    private static function validateApiKey($apiKey): bool
    {
        if ($apiKey == '' || ! is_string($apiKey)) {
            throw new InvalidArgumentException('Api key must be a string and cannot be empty');
        }

        return true;
    }
}
