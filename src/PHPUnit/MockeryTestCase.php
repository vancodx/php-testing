<?php declare(strict_types=1);

namespace VanCodX\Testing\PHPUnit;

use Mockery\Adapter\Phpunit\MockeryTestCase as BaseMockeryTestCase;
use VanCodX\Testing\PHPUnit\Traits\AssertsTrait;

abstract class MockeryTestCase extends BaseMockeryTestCase
{
    use AssertsTrait;
}
