<?php

declare(strict_types=1);

namespace SamihSoylu\Utility;

use LogicException;
use ReflectionClass;
use SplFileInfo;

final class ClassInspector
{
    public function hasMethod(string $fqcn, string $methodName): bool
    {
        if (!class_exists($fqcn)) {
            throw new LogicException("Class '{$fqcn}' not found");
        }

        $reflection = new ReflectionClass($fqcn);
        return $reflection->hasMethod($methodName);
    }

    public function getFirstParameterTypeForMethod(string $fqcn, string $methodName): ?string
    {
        if (!class_exists($fqcn)) {
            throw new LogicException("Class '{$fqcn}' not found");
        }

        $reflection = new ReflectionClass($fqcn);

        if (!$reflection->hasMethod($methodName)) {
            throw new LogicException(
                "Class '{$fqcn}' does not have a method named '{$methodName}'."
            );
        }

        $method = $reflection->getMethod($methodName);
        $parameters = $method->getParameters();

        if ($parameters === []) {
            return null;
        }

        $type = $parameters[0]->getType();

        return $type?->getName();
    }
}
