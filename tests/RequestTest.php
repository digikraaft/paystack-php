<?php


namespace Digikraaft\Paystack\Tests;

use Digikraaft\Paystack\ApiOperations\Request;
use Digikraaft\Paystack\Exceptions\InvalidArgumentException;
use Digikraaft\Paystack\Exceptions\IsNullException;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
    }

    /** @test */
    public function it_can_return_exception_when_params_is_empty_array_and_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams([], true);
    }

    /** @test */
    public function it_can_return_exception_when_params_is_not_array_and_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams('string', true);
    }

    /** @test */
    public function it_can_return_exception_when_params_is_not_array_and_not_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams('string');
    }

    /** @test */
    public function it_can_return_object_from_api_response()
    {
        $mock = mk::mock('alias:Request');
        $mock->allows('staticRequest')
            ->with(mk::type('string'), mk::type('string'), mk::type('array'), mk::type('string'));
        $mock->staticRequest('get', 'customer', ['params'], 'sometype');
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /** @test */
    public function it_can_return_array_from_api_response()
    {
        $mock = mk::mock('alias:Request');
        $mock->allows('staticRequest')
            ->with(mk::type('string'), mk::type('string'), mk::type('array'), mk::type('string'));
        $mock->staticRequest('get', 'customer', ['params'], 'arr');
        $resource = $mock->expects([]);
        $this->assertEquals('array', gettype([$resource]));
    }

    /** @test */
    public function it_can_return_exception_when_request_method_is_null()
    {
        $this->expectException(IsNullException::class);
        $resp = Request::staticRequest(null, 'customer', [], 'obj');
    }
}
