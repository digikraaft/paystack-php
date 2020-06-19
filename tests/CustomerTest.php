<?php

namespace Digikraaft\Paystack\Tests;

use Mockery as mk;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_return_all(): void
    {
        $mock = mk::mock('alias:Customer');
        $mock->allows('list');
        $mock->list();
        $resources = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resources));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_create_customer(): void
    {
        $mock = mk::mock('alias:Customer');
        $mock->allows('create')
                    ->with(mk::type('array'));
        $mock->create(['data']);
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_fetch_customer(): void
    {
        $mock = mk::mock('alias:Customer');
        $mock->allows('fetch')
                    ->with(mk::type('string'));
        $mock->fetch('customer_id');
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_update_customer(): void
    {
        $mock = mk::mock('alias:Customer');
        $mock->allows('update')
                    ->with(mk::type('string'), mk::type('array'));
        $mock->update('customer_id', ['customer']);
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_white_or_black_list_customer(): void
    {
        $mock = mk::mock('alias:Customer');
        $mock->allows('whiteOrBlackList')
            ->with(mk::type('array'));
        $mock->whiteOrBlackList(['customer']);
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_can_deactivate_authorization(): void
    {
        $mock = mk::mock('alias:Customer');
        $mock->allows('deactivateAuthorization')
            ->with(mk::type('array'));
        $mock->deactivateAuthorization(['customer']);
        $resp = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resp));
    }
}
