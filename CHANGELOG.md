# Changelog

All notable changes to `paystack-php` will be documented in this file

## v2.2.0 - 2023-03-04
- Added support for PHP 8.2

## v2.1.0 - 2022-07-05
- Added support for PHP 8.1

## v2.0.0 - 2022-02-08
- Added support for PHP-8
- Fixed the vulnerable action for actions/checkout

## v1.2.1 - 2021-02-21
- Fixed bank related endpoints


## v1.2.0 - 2021-02-19
- Updated composer dependency for guzzle

## v1.1.0 - 2021-02-19
- Updated doc links to match the new API docs
- Added `Bank::resolveBvnPremium(string $bvn)` method
- Added `BulkCharge::fetchBulkChargeBatch(string $id_or_code, $params = nul)` method
- Added `Charge::submitAddress(array $params)` method
- Added `Transaction::checkAuthorization(array $params)` method
- Added `TransferRecipient::createBulk(array $params)` method

## v1.0.2 - 2020-06-18
- Removed redundant ApiErrorException Exception
- Fixed UnexpectedValueException Exception namespace to be psr-4 compliant

## v1.0.1 - 2020-06-17

- Fixed the verify Transaction endpoint


## 1.0.0 - 2020-06-11

- initial release
