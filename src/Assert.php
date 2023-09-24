<?php

declare(strict_types=1);

namespace SamihSoylu\Utility;

use UnexpectedValueException;

final class Assert
{
    /**
     * @phpstan-assert !null $value
     * @psalm-assert !null $value
     *
     * @throws UnexpectedValueException
     */
    public static function notNull(mixed $value, string $message): void
    {
        if (is_null($value)) {
            throw new UnexpectedValueException($message);
        }
    }

    /**
     * @phpstan-assert string $value
     * @psalm-assert string $value
     *
     * @throws UnexpectedValueException
     */
    public static function isString(mixed $value, string $message): void
    {
        if (!is_string($value)) {
            throw new UnexpectedValueException($message);
        }
    }

    /**
     * @phpstan-assert int $value
     * @psalm-assert int $value
     *
     * @throws UnexpectedValueException
     */
    public static function isInteger(mixed $value, string $message): void
    {
        if (!is_integer($value)) {
            throw new UnexpectedValueException($message);
        }
    }

    /**
     * @phpstan-assert float $value
     * @psalm-assert float $value
     *
     * @throws UnexpectedValueException
     */
    public static function isFloat(mixed $value, string $message): void
    {
        if (!is_float($value)) {
            throw new UnexpectedValueException($message);
        }
    }

    /**
     * @throws UnexpectedValueException
     */
    public static function stringIsFilled(string $value, string $message): void
    {
        if (empty($value)) {
            throw new UnexpectedValueException($message);
        }
    }

    /**
     * @throws UnexpectedValueException
     */
    public static function isPositive(int|float $value, string $message): void
    {
        if ($value < 1) {
            throw new UnexpectedValueException($message);
        }
    }
}
