<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SamihSoylu\Utility\ClassInspector;

it('should correctly detect if a class has a method', function () {
    $inspector = new ClassInspector();

    expect($inspector->hasMethod(TestCase::class, 'setUp'))->toBeTrue()
        ->and($inspector->hasMethod(TestCase::class, 'nonExistentMethod'))->toBeFalse();
});

it('should throw logic exception when has method finds class does not exist', function () {
    $inspector = new ClassInspector();

    $inspector->hasMethod('NonExistentClass', 'anyMethod');
})->throws(LogicException::class);

it('should get the first parameter type for a method', function () {
    $inspector = new ClassInspector();

    expect($inspector->getFirstParameterTypeForMethod(DateTime::class, 'setTimezone'))
        ->toBe('DateTimeZone');
});

it('should return null if method has no parameters', function () {
    $inspector = new ClassInspector();

    expect($inspector->getFirstParameterTypeForMethod(DateTime::class, 'getTimestamp'))->toBeNull();
});

it('should throw logic exception if method does not exist in class', function () {
    $inspector = new ClassInspector();

    $inspector->getFirstParameterTypeForMethod(DateTime::class, 'nonExistentMethod');
})->throws(LogicException::class);

it('should throw logic exception when first param method finds class does not exist', function () {
    $inspector = new ClassInspector();

    $inspector->getFirstParameterTypeForMethod('NonExistentClass', 'anyMethod');
})->throws(LogicException::class);
