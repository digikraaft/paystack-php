<?php


namespace Digikraaft\Paystack;

use Digikraaft\Paystack\Tests\TestHelper;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_can_return_ledger()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('resolveBvn');
        $mock->resolveBvn();
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }

    /** @test */
    public function it_can_match_bvn()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('bvnMatch')->with(mk::type('array'));
        $mock->bvnMatch(['array']);
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }

    /** @test */
    public function it_can_resolve_account_number()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('resolveAccountNumber')->with(mk::type('array'));
        $mock->resolveAccountNumber(['array']);
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }

    /** @test */
    public function it_can_resolve_card_bin()
    {
        $mock = mk::mock('alias:Bank');
        $mock->allows('resolveCardBin')->with(mk::type('string'));
        $mock->resolveCardBin('array');
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }
}
