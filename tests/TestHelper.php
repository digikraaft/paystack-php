<?php

namespace Digikraaft\Paystack\Tests;

use Digikraaft\Paystack\Paystack;

class TestHelper
{
    public static function setup()
    {
        Paystack::$apiBase = 'https://api.paystack.co';
        Paystack::setApiKey('sk_abcd12345');
    }
}
