<?php

namespace Digikraaft\Paystack;

class SubAccount extends ApiResource
{
    const OBJECT_NAME = 'subaccount';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Fetch;
    use ApiOperations\Update;
}
