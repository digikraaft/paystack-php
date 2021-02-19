<?php

namespace Digikraaft\Paystack;

class TransferRecipient extends ApiResource
{
    const OBJECT_NAME = 'transferrecipient';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Update;

    /**
     * @param array $batch
     *
     * @link https://paystack.com/docs/api/#transfer-recipient-bulk
     *
     * @return array|object
     */
    public static function createBulk($batch)
    {
        $url = static::endPointUrl('bulk');
        return static::staticRequest('POST', $url, $batch);
    }

    /**
     * @param $recipient_code
     *
     * @link https://paystack.com/docs/api/#transfer-recipient-delete
     *
     * @return array|object
     */
    public static function delete($recipient_code)
    {
        $url = static::resourceUrl($recipient_code);

        return static::staticRequest('DELETE', $url);
    }
}
