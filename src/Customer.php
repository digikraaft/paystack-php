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
     * @param array $params containing the customer code of the customer to white/black list and
     * one can be one of the possible risk actions:
     * default or deny:
     * customer and risk_action
     * data = ['customer'=>'CUS_123456789','risk_action'=>'default']
     * @return array|Object
     * @throws Exceptions\InvalidArgumentException|Exceptions\IsNullException
     *
     * @link https://developers.paystack.co/reference#whiteblacklist-customer
     */
    public static function whiteOrBlackList($params)
    {
        self::validateParams($params);
        $url = static::classUrl() . '/set_risk_action';

        return static::staticRequest('post', $url, $params);
    }

    /**
     * @param array $params Authorization code to be deactivated with authorization_code
     * as the array key. data = ['authorization_code'=>'aser12334556']
     *
     * @return array|Object
     * @throws Exceptions\InvalidArgumentException|Exceptions\IsNullException
     *
     * @link https://developers.paystack.co/reference#deactivate-authorization
     */
    public static function deactivateAuthorization($params)
    {
        self::validateParams($params);
        $url = static::classUrl() . '/deactivate_authorization';

        return static::staticRequest('post', $url, $params, 'arr');
    }
}
