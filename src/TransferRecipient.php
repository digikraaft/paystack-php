<?php


namespace Digikraaft\Paystack;

class TransferRecipient extends ApiResource
{
    const OBJECT_NAME = 'transferrecipient';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Update;

    /**
     * @param $recipient_code
     * @link https://developers.paystack.co/reference#delete-transfer-recipient
     *
     * @return array|Object
     */
    public static function delete($recipient_code)
    {
        $url = static::resourceUrl($recipient_code);

        return static::staticRequest('DELETE', $url);
    }
}
