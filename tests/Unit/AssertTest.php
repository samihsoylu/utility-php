<?php

declare(strict_types=1);

use SamihSoylu\Utility\Assert;

it('does not throw an exception for non-null values', function () {
    Assert::notNull("hello", "Value is null.");
    Assert::notNull(123, "Value is null.");
})->expectNotToPerformAssertions();

it('throws an exception for null values', function () {
    Assert::notNull(null, "Value is null.");
})->throws(UnexpectedValueException::class, "Value is null.");

it('does not throw an exception for string values', function () {
    Assert::isString("hello", "Value is not a string.");
})->expectNotToPerformAssertions();

it('throws an exception for non-string values', function () {
    Assert::isString(123, "Value is not a string.");
})->throws(UnexpectedValueException::class, "Value is not a string.");

it('does not throw an exception for integer values', function () {
    Assert::isInteger(123, "Value is not an integer.");
})->expectNotToPerformAssertions();

it('throws an exception for non-integer values', function () {
    Assert::isInteger("hello", "Value is not an integer.");
})->throws(UnexpectedValueException::class, "Value is not an integer.");

it('does not throw an exception for float values', function () {
    Assert::isFloat(123.45, "Value is not a float.");
})->expectNotToPerformAssertions();

it('throws an exception for non-float values', function () {
    Assert::isFloat("hello", "Value is not a float.");
})->throws(UnexpectedValueException::class, "Value is not a float.");

it('does not throw an exception for filled strings', function () {
    Assert::stringIsFilled("hello", "String is not filled.");
})->expectNotToPerformAssertions();

it('throws an exception for empty strings', function () {
    Assert::stringIsFilled("", "String is not filled.");
})->throws(UnexpectedValueException::class, "String is not filled.");

it('does not throw an exception for positive values', function () {
    Assert::isPositive(5, "Value is not positive.");
    Assert::isPositive(5.5, "Value is not positive.");
})->expectNotToPerformAssertions();

it('throws an exception for non-positive values', function () {
    Assert::isPositive(0, "Value is not positive.");
})->throws(UnexpectedValueException::class, "Value is not positive.");
