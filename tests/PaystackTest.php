<?php

namespace Digikraaft\Paystack\Tests;

use Digikraaft\Paystack\Exceptions\InvalidArgumentException;
use Digikraaft\Paystack\Paystack;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class PaystackTest extends TestCase
{
    protected $paystack;
    protected $mock;

    public function setUp(): void
    {
        TestHelper::setup();
        $this->paystack = mk::mock('Digikraaft\Paystack\Paystack');
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_returns_instance_of_paystack()
    {
        $this->assertInstanceOf("Digikraaft\Paystack\Paystack", $this->paystack);
    }

    /** @test */
    public function it_returns_invalid_api_key()
    {
        $this->expectException(InvalidArgumentException::class);
        Paystack::setApiKey('');
    }

    /** @test */
    public function it_returns_api_key()
    {
        Paystack::setApiKey('sk_apikey');
        $this->assertIsString(Paystack::getApiKey());
    }
}
