<?php

namespace Digikraaft\Paystack;

class Refund extends ApiResource
{
    const OBJECT_NAME = 'refund';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
}
