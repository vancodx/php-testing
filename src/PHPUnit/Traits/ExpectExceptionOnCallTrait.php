<?php declare(strict_types=1);

namespace VanCodX\Testing\PHPUnit\Traits;

use Exception;
use Throwable;

trait ExpectExceptionOnCallTrait
{
    /**
     * @param class-string<Throwable> $exceptionClass
     * @param callable $callback
     * @param string $message [optional]
     * @return void
     */
    final public static function expectExceptionOnCall(
        string $exceptionClass,
        callable $callback,
        string $message = ''
    ): void {
        $actual = null;
        try {
            $callback();
        } catch (Throwable $exception) {
            $actual = $exception;
        }
        static::assertInstanceOf($exceptionClass, $actual, $message);
    }

    /**
     * @param int $exceptionCode
     * @param callable $callback
     * @param string $message [optional]
     * @return void
     */
    final public static function expectExceptionCodeOnCall(
        int $exceptionCode,
        callable $callback,
        string $message = ''
    ): void {
        $actual = null;
        try {
            $callback();
        } catch (Throwable $exception) {
            $actual = $exception;
        }
        static::assertInstanceOf(Throwable::class, $actual, $message);
        static::assertSame($exceptionCode, $actual->getCode(), $message);
    }

    /**
     * @param string $exceptionMessage
     * @param callable $callback
     * @param string $message [optional]
     * @return void
     */
    final public static function expectExceptionMessageOnCall(
        string $exceptionMessage,
        callable $callback,
        string $message = ''
    ): void {
        $actual = null;
        try {
            $callback();
        } catch (Throwable $exception) {
            $actual = $exception;
        }
        static::assertInstanceOf(Throwable::class, $actual, $message);
        static::assertSame($exceptionMessage, $actual->getMessage(), $message);
    }

    /**
     * @param string $exceptionMessagePattern
     * @param callable $callback
     * @param string $message [optional]
     * @return void
     */
    final public static function expectExceptionMessageMatchesOnCall(
        string $exceptionMessagePattern,
        callable $callback,
        string $message = ''
    ): void {
        $actual = null;
        try {
            $callback();
        } catch (Throwable $exception) {
            $actual = $exception;
        }
        static::assertInstanceOf(Throwable::class, $actual, $message);
        static::assertMatchesRegularExpression($exceptionMessagePattern, $actual->getMessage(), $message);
    }

    /**
     * @param Exception $expected
     * @param callable $callback
     * @param string $message [optional]
     * @return void
     */
    final public static function expectExceptionObjectOnCall(
        Exception $expected,
        callable $callback,
        string $message = ''
    ): void {
        $actual = null;
        try {
            $callback();
        } catch (Throwable $exception) {
            $actual = $exception;
        }
        static::assertInstanceOf($expected::class, $actual, $message);
        static::assertSame($expected->getCode(), $actual->getCode(), $message);
        static::assertSame($expected->getMessage(), $actual->getMessage(), $message);
    }
}
