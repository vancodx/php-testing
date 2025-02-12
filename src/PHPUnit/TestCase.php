<?php declare(strict_types=1);

namespace VanCodX\Testing\PHPUnit;

use PHPUnit\Framework\TestCase as BaseTestCase;
use VanCodX\Testing\PHPUnit\Traits\AssertsTrait;

abstract class TestCase extends BaseTestCase
{
    use AssertsTrait;
}
