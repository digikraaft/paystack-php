<?php

namespace Digikraaft\Paystack;

class Customer extends ApiResource
{
    const OBJECT_NAME = 'customer';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     * @param $customerCode
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://paystack.com/docs/api/#customer-validate
     */
    public static function validate($customerCode)
    {
        $url = static::classUrl().'/{$customerCode}/identification';

        return static::staticRequest('POST', $url);
    }

    /**
     * @param array $params containing the customer code of the customer to white/black list and
     *                      one can be one of the possible risk actions:
     *                      default or deny:
     *                      customer and risk_action
     *                      data = ['customer'=>'CUS_123456789','risk_action'=>'default']
     *
     * @throws Exceptions\InvalidArgumentException|Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://paystack.com/docs/api/#customer-whitelist-blacklist
     */
    public static function whiteOrBlackList($params)
    {
        self::validateParams($params);
        $url = static::classUrl().'/set_risk_action';

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params Authorization code to be deactivated with authorization_code
     *                      as the array key. data = ['authorization_code'=>'aser12334556']
     *
     * @throws Exceptions\InvalidArgumentException|Exceptions\IsNullException
     *
     * @return array|object
     *
     * @link https://paystack.com/docs/api/#customer-deactivate-authorization
     */
    public static function deactivateAuthorization($params)
    {
        self::validateParams($params);
        $url = static::classUrl().'/deactivate_authorization';

        return static::staticRequest('POST', $url, $params, 'arr');
    }
}
