<?php declare(strict_types=1);

namespace VanCodX\Testing\PHPUnit;

use Mockery\Adapter\Phpunit\MockeryTestCase as BaseMockeryTestCase;
use VanCodX\Testing\PHPUnit\Traits\AssertTraits;

abstract class MockeryTestCase extends BaseMockeryTestCase
{
    use AssertTraits;
}
