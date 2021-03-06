# Introduction
[![Build Status](https://travis-ci.com/digikraaft/paystack-php.svg?branch=master)](https://travis-ci.com/digikraaft/paystack-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/digikraaft/paystack-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/digikraaft/paystack-php/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/digikraaft/paystack-php/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Total Downloads](https://poser.pugx.org/digikraaft/paystack-php/downloads)](//packagist.org/packages/digikraaft/paystack-php)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)


This package provides an expressive and convenient way to interact with the [Paystack API](https://developers.paystack.co/reference).

## Installation

You can install the package via composer:

```bash
composer require digikraaft/paystack-php
```

## Usage

All APIs documented in Paystack's [Developer Reference](https://developers.paystack.co/reference) are currently supported by this package.
Using the individual API follows a general convention so that it can be simple and predictable.

```
<?php 

{API_NAME}::{API_END_POINT}();

```
Before this, the API key needs to be set. For example, to access the `customer/list` endpoint,
```
<?php 

use Digikraaft\Paystack\Paystack;
use Digikraaft\Paystack\Customer;

Paystack::setApiKey('sk_1234abcd');
$customers = Customer::list();

```
You can easily pass parameters to be sent as arguments to the `API_END_POINT` method like this:
```
<?php

use Digikraaft\Paystack\Paystack;
use Digikraaft\Paystack\Customer;

Paystack::setApiKey('sk_1234abcd');

$params = [
    'perPage' => 10,
    'page' => 2,
];

$customers = Customer::list($params);

```
This also applies to `POST` and `PUT` requests.

For endpoints that require path parameters like the `fetch customer` with the request like `/customer/email_or_id_or_customer_code`,
simply pass in a string into the `API_END_POINT` like this:

```
<?php

use Digikraaft\Paystack\Paystack;
use Digikraaft\Paystack\Customer;

Paystack::setApiKey('sk_1234abcd');
$customer = Customer::fetch('CUS_abc1234');

```

For `API_END_POINT`s that take both path and body parameters like the `update customer` with the `PUT` request `customer/id_or_customer_code`,
simply pass in a string as the first argument, an array as the second like this:

```
<?php

use Digikraaft\Paystack\Paystack;
use Digikraaft\Paystack\Customer;

$params = [
    'first_name' => 'Tim',
    'last_name' => 'Oladoyinbo',
];

Paystack::setApiKey('sk_1234abcd');
$customer = Customer::update('CUS_abc1234', $params);

```

There are a few exceptions to the `API_END_POINT` convention.

The endpoint `paymentrequest/list` becomes `Invoice::list()`. This applies to all other actions as documented in the Paystack reference.\
The endpoint `bvn/match` becomes `Bank::bvnMatch(array $params)`\
The endpoint `decision/bin/{bin}` becomes `Bank::resolveCardBin(string $bin)`
<br><br>
This package returns the exact response from the Paystack API but as the `stdClass` type such that responses can be accessed like this:

```
<?php

use Digikraaft\Paystack\Paystack;
use Digikraaft\Paystack\Customer;

Paystack::setApiKey('sk_1234abcd');
$customer = Customer::fetch('CUS_abc1234');

if ($customer->status && $customer->status == true) {
    echo $customer->data->first_name;
}

```
Future updates will see to improving on how the response object is handled.

## Documentation
For detailed documentation, check the wiki page [here](../../wiki)

## Todo
* Comprehensive tests
* Better API response handling

## Testing

``` bash
composer test
```
## More Good Stuff
Check [here](https://github.com/digikraaft) for more awesome free stuff!

## Alternatives
- [paystack-php](https://github.com/yabacon/paystack-php)
- [perfectmak/paystack-php](https://github.com/perfectmak/paystack-php)
- [matscode/paystack-php](https://github.com/matscode/paystack)
- [PHP Library For Paystack.co (Unofficial)](https://github.com/MalikAbiola/paystack-php-lib)
- [Cakephp-Paystack](https://github.com/jtad009/cakephp-paystack)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email dev@digitalkraaft.com instead of using the issue tracker.

## Credits

- [Tim Oladoyinbo](https://github.com/timoladoyinbo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
