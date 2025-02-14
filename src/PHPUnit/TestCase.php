<?php declare(strict_types=1);

namespace VanCodX\Testing\PHPUnit;

use PHPUnit\Framework\TestCase as BaseTestCase;
use VanCodX\Testing\PHPUnit\Traits\AssertTraits;

abstract class TestCase extends BaseTestCase
{
    use AssertTraits;
}
