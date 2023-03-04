<?php

namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;

class PaymentPage extends ApiResource
{
    const OBJECT_NAME = 'page';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     *
     * @link https://paystack.com/docs/api/#page-check-slug
     *
     */
    public static function checkSlugAvailability(string $slug): array|object
    {
        $slug = 'check_slug_availability/'.$slug;
        $url = static::endPointUrl($slug);

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @link https://paystack.com/docs/api/#page-add-products
     *
     * @throws InvalidArgumentException
     */
    public static function addProducts(string $page_id, ?array $params = null): array|object
    {
        self::validateParams($params, true);
        $url = static::resourceUrl($page_id).'/product';

        return static::staticRequest('POST', $url);
    }
}
