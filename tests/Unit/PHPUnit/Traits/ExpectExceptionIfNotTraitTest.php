<?php declare(strict_types=1);

namespace Tests\Unit\PHPUnit\Traits;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use VanCodX\Testing\PHPUnit\TestCase;

class ExpectExceptionIfNotTraitTest extends TestCase
{
    /**
     * @return list<array{0: bool}>
     */
    public static function trueFalseDataProvider(): array
    {
        return [[true], [false]];
    }

    /**
     * @param bool $value
     * @return void
     */
    #[DataProvider('trueFalseDataProvider')]
    public function testExpectExceptionIfNot(bool $value): void
    {
        $this->expectExceptionIfNot($value, InvalidArgumentException::class);

        if (!$value) {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @param bool $value
     * @return void
     */
    #[DataProvider('trueFalseDataProvider')]
    public function testExpectExceptionCodeIfNot(bool $value): void
    {
        $this->expectExceptionCodeIfNot($value, 25);

        if (!$value) {
            throw new InvalidArgumentException(code: 25);
        }
    }

    /**
     * @param bool $value
     * @return void
     */
    #[DataProvider('trueFalseDataProvider')]
    public function testExpectExceptionMessageIfNot(bool $value): void
    {
        $this->expectExceptionMessageIfNot($value, 'Argument "name" is invalid.');

        if (!$value) {
            throw new InvalidArgumentException('Argument "name" is invalid.');
        }
    }

    /**
     * @param bool $value
     * @return void
     */
    #[DataProvider('trueFalseDataProvider')]
    public function testExpectExceptionMessageMatchesIfNot(bool $value): void
    {
        $this->expectExceptionMessageMatchesIfNot($value, '~^Argument "\w+" is invalid\.$~');

        if (!$value) {
            throw new InvalidArgumentException('Argument "message" is invalid.');
        }
    }

    /**
     * @param bool $value
     * @return void
     */
    #[DataProvider('trueFalseDataProvider')]
    public function testExpectExceptionObjectIfNot(bool $value): void
    {
        $this->expectExceptionObjectIfNot($value, new InvalidArgumentException('Argument "class" is invalid.', 125));

        if (!$value) {
            throw new InvalidArgumentException('Argument "class" is invalid.', 125);
        }
    }
}
