<?php


namespace Digikraaft\Paystack;

class PaymentPage extends ApiResource
{
    const OBJECT_NAME = 'page';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;

    /**
     * @param string $slug details at
     * @link https://developers.paystack.co/reference#check-slug-availability
     * @return array|Object
     */
    public static function checkSlugAvailability($slug)
    {
        $slug = 'check_slug_availability/'.$slug;
        $url = static::endPointUrl($slug);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $page_id
     * @param array $params details at
     * @link https://developers.paystack.co/reference#add-products
     * @return array|Object
     */
    public static function addProducts($page_id, $params)
    {
        self::validateParams($params, true);
        $url = static::resourceUrl($page_id).'/product';

        return static::staticRequest('POST', $url);
    }
}
