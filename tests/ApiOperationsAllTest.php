<?php

namespace Digikraaft\Paystack\Tests;

use Mockery as mk;
use PHPUnit\Framework\TestCase;

class ApiOperationsAllTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    public function test_it_can_list_all()
    {
        $mock = mk::mock('alias:All');
        $mock->allows('list');
        $mock->list();
        $resources = $mock->expects(\Digikraaft\Paystack\Customer::class);
        $this->assertEquals('object', gettype($resources));
    }
}
