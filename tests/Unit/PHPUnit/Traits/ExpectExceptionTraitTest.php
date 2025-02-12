<?php declare(strict_types=1);

namespace Tests\Unit\PHPUnit\Traits;

use InvalidArgumentException;
use PHPUnit\Framework\AssertionFailedError;
use UnexpectedValueException;
use VanCodX\Testing\PHPUnit\TestCase;

class ExpectExceptionTraitTest extends TestCase
{
    /**
     * @return void
     */
    public function testExpectExceptionOnCall(): void
    {
        $this->expectExceptionOnCall(InvalidArgumentException::class, static function (): void {
            throw new InvalidArgumentException();
        });

        $this->expectException(AssertionFailedError::class);

        $this->expectExceptionOnCall(InvalidArgumentException::class, static function (): void {
            throw new UnexpectedValueException();
        });
    }

    /**
     * @return void
     */
    public function testExpectExceptionCodeOnCall(): void
    {
        $this->expectExceptionCodeOnCall(25, static function (): void {
            throw new InvalidArgumentException(code: 25);
        });

        $this->expectException(AssertionFailedError::class);

        $this->expectExceptionCodeOnCall(25, static function (): void {
            throw new InvalidArgumentException(code: 125);
        });
    }

    /**
     * @return void
     */
    public function testExpectExceptionMessageOnCall(): void
    {
        $this->expectExceptionMessageOnCall('Argument "name" is invalid.', static function (): void {
            throw new InvalidArgumentException('Argument "name" is invalid.');
        });

        $this->expectException(AssertionFailedError::class);

        $this->expectExceptionMessageOnCall('Argument "name" is invalid.', static function (): void {
            throw new InvalidArgumentException('Argument "class" is invalid.');
        });
    }

    /**
     * @return void
     */
    public function testExpectExceptionMessageMatchesOnCall(): void
    {
        $this->expectExceptionMessageMatchesOnCall('~^Argument "\w+" is invalid\.$~', static function (): void {
            throw new InvalidArgumentException('Argument "message" is invalid.');
        });

        $this->expectException(AssertionFailedError::class);

        $this->expectExceptionMessageMatchesOnCall('~^Argument "\w+" is invalid\.$~', static function (): void {
            throw new UnexpectedValueException('Value "message" is invalid.');
        });
    }

    /**
     * @return void
     */
    public function testExpectExceptionObjectOnCall(): void
    {
        $this->expectExceptionObjectOnCall(
            new InvalidArgumentException('Argument "class" is invalid.', 125),
            static function (): void {
                throw new InvalidArgumentException('Argument "class" is invalid.', 125);
            }
        );

        $this->expectException(AssertionFailedError::class);

        $this->expectExceptionObjectOnCall(
            new InvalidArgumentException('Argument "class" is invalid.', 125),
            static function (): void {
                throw new UnexpectedValueException('Value "class" is invalid.', 125);
            }
        );
    }
}
