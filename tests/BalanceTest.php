<?php

namespace Digikraaft\Paystack\Tests;

use Mockery as mk;
use PHPUnit\Framework\TestCase;

class BalanceTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_can_return_ledger()
    {
        $mock = mk::mock('alias:Balance');
        $mock->allows('ledger');
        $mock->ledger();
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }
}
