<?php

declare(strict_types=1);

use SamihSoylu\Utility\FileInspector;

it('should correctly get namespace from file', function () {
    $dummyClassPath = dirname(__DIR__) . '/TestFramework/TestDouble/Dummy/DummyValidClass.php';
    $file = new SplFileInfo($dummyClassPath);

    $fileInspector = new FileInspector();
    expect($fileInspector->getNamespaceFromFile($file))->toBe('TestFramework\TestDouble\Dummy');
});

it('should throw logic exception when namespace is not found', function () {
    $dummyClassPath = dirname(__DIR__) . '/TestFramework/TestDouble/Dummy/DummyInvalidClass.php';
    $file = new SplFileInfo($dummyClassPath);

    $fileInspector = new FileInspector();
    $fileInspector->getNamespaceFromFile($file);
})->throws(LogicException::class);

it('should correctly get class name from file', function () {
    $dummyClassPath = dirname(__DIR__) . '/TestFramework/TestDouble/Dummy/DummyValidClass.php';
    $file = new SplFileInfo($dummyClassPath);

    $fileInspector = new FileInspector();
    expect($fileInspector->getClassNameFromFile($file))->toBe('DummyValidClass');
});

it('should throw logic exception when class name is not found', function () {
    $dummyClassPath = dirname(__DIR__) . '/TestFramework/TestDouble/Dummy/DummyInterface.php';
    $file = new SplFileInfo($dummyClassPath);

    $fileInspector = new FileInspector();
    $fileInspector->getClassNameFromFile($file);
})->throws(LogicException::class);

it('should correctly get fully qualified class name from file', function () {
    $dummyClassPath = dirname(__DIR__) . '/TestFramework/TestDouble/Dummy/DummyValidClass.php';
    $file = new SplFileInfo($dummyClassPath);

    $fileInspector = new FileInspector();
    expect($fileInspector->getFullyQualifiedClassName($file))
        ->toBe('TestFramework\TestDouble\Dummy\DummyValidClass');
});
