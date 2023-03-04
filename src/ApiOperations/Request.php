<?php

namespace Digikraaft\Paystack\ApiOperations;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;
use Digikraaft\Paystack\Exceptions\IsNullException;
use Digikraaft\Paystack\Paystack;
use GuzzleHttp\Client;

/**
 * Trait for resources that need to make API requests.
 */
trait Request
{

    protected static $client;


    protected static mixed $response;


    public static function validateParams(mixed $params = null, bool $required = false): void
    {
        if ($required) {
            if (empty($params) || ! is_array($params)) {
                $message = 'The parameter passed must be an array and must not be empty';

                throw new InvalidArgumentException($message);
            }
        }
        if ($params && ! is_array($params)) {
            $message = 'The parameter passed must be an array';

            throw new InvalidArgumentException($message);
        }
    }

    public static function staticRequest(string $method, string $url, array $params = [], string $return_type = 'obj'): array|object
    {
        if ($return_type != 'arr' && $return_type != 'obj') {
            throw new InvalidArgumentException('Return type can only be obj or arr');
        }
        static::setHttpResponse($method, $url, $params);

        if ($return_type == 'arr') {
            return static::getResponseData();
        }

        return \Digikraaft\Paystack\Util\Util::convertArrayToObject(static::getResponse());
    }

    /**
     * Set options for making the Client request.
     */
    protected static function setRequestOptions(): void
    {
        $authBearer = 'Bearer '.Paystack::$apiKey;

        static::$client = new Client(
            [
                'base_uri' => Paystack::$apiBase,
                'headers' => [
                    'Authorization' => $authBearer,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
            ]
        );
    }


    private static function setHttpResponse(string $method, string $url, array $body = []): \GuzzleHttp\Psr7\Response
    {

        static::setRequestOptions();

        static::$response = static::$client->{strtolower($method)}(
            Paystack::$apiBase.'/'.$url,
            ['body' => json_encode($body)]
        );

        return static::$response;
    }


    private static function getResponse(): array
    {
        return json_decode(static::$response->getBody(), true);
    }


    private static function getResponseData(): array
    {
        return json_decode(static::$response->getBody(), true)['data'];
    }
}
