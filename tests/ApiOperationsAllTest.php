<?php


namespace Digikraaft\Paystack\Tests;

use Digikraaft\Paystack\ApiOperations\All;
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


//        $mock = $this->getMockForTrait('alias:All', [], '', true, true, true, ['list'], false);
//        $mock->expects($this->once())
//            ->method('list');
//        $mock->list();

//        /** @var All $mock */
//        $mock = $this->buildMock();
//
//        $mock->expects($this->any())
//            ->method('list')
//            ->will($this->returnValue(true));
//
//        $this->assertTrue($mock->concreteMethod());
//        $mock->list();

//        $array = $this->list();
//        $this->assertEquals('array', gettype([$array]));
    }
}
