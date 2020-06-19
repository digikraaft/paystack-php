<?php

namespace Digikraaft\Paystack;

class Verification extends ApiResource
{
    const OBJECT_NAME = 'verifications';

    /*
     *
     * @link https://developers.paystack.co/reference#resolve-phone-number
     */
    use ApiOperations\All;
}
