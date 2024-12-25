<?php declare(strict_types=1);

namespace Tests\Unit;

use Mockery;
use Psr\Container\ContainerInterface;
use VanCodX\Testing\PHPUnit\MockeryTestCase;

class ExampleMockeryTest extends MockeryTestCase
{
    /**
     * @return void
     */
    public function testExampleMockery(): void
    {
        $mock = Mockery::mock(ContainerInterface::class);

        $mock->expects('has')->once()->with('five')->andReturnTrue();
        $mock->expects('get')->once()->with('five')->andReturn('ten');

        $mock->expects('has')->never();
        $mock->expects('get')->never();

        $this->assertTrue($mock->has('five'));
        $this->assertSame('ten', $mock->get('five'));
    }
}
