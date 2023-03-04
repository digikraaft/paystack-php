<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class TransferRecipient extends ApiResource
{
    const OBJECT_NAME = 'transferrecipient';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Update;

    /**
     *
     * @link https://paystack.com/docs/api/#transfer-recipient-bulk
     *
     * @throws InvalidArgumentException
     */
    public static function createBulk(array $batch): array|object
    {
        $url = static::endPointUrl('bulk');

        return static::staticRequest('POST', $url, $batch);
    }

    /**
     * @link https://paystack.com/docs/api/#transfer-recipient-delete
     *
     * @throws InvalidArgumentException
     */
    public static function delete(string $recipient_code): array|object
    {
        $url = static::resourceUrl($recipient_code);

        return static::staticRequest('DELETE', $url);
    }
}
