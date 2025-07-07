<?php declare(strict_types=1);

namespace VanCodX\Testing\PHPUnit\Traits;

use Exception;
use Throwable;

trait ExpectExceptionIfNotTrait
{
    /**
     * @param bool $value
     * @param class-string<Throwable> $exceptionClass
     * @return void
     */
    final protected function expectExceptionIfNot(bool $value, string $exceptionClass): void
    {
        if (!$value) {
            $this->expectException($exceptionClass);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    /**
     * @param bool $value
     * @param int $exceptionCode
     * @return void
     */
    final protected function expectExceptionCodeIfNot(bool $value, int $exceptionCode): void
    {
        if (!$value) {
            $this->expectExceptionCode($exceptionCode);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    /**
     * @param bool $value
     * @param string $exceptionMessage
     * @return void
     */
    final protected function expectExceptionMessageIfNot(bool $value, string $exceptionMessage): void
    {
        if (!$value) {
            $this->expectExceptionMessage($exceptionMessage);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    /**
     * @param bool $value
     * @param string $exceptionMessagePattern
     * @return void
     */
    final protected function expectExceptionMessageMatchesIfNot(bool $value, string $exceptionMessagePattern): void
    {
        if (!$value) {
            $this->expectExceptionMessageMatches($exceptionMessagePattern);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }

    /**
     * @param bool $value
     * @param Exception $exception
     * @return void
     */
    final protected function expectExceptionObjectIfNot(bool $value, Exception $exception): void
    {
        if (!$value) {
            $this->expectExceptionObject($exception);
        } else {
            $this->expectNotToPerformAssertions();
        }
    }
}
