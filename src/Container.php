<?php

namespace ServiceContainer;

class Container
{
    static $singletonClasses = [];
    static $boundedClasses = [];

    public function bind(string $abstractClass, callable $concreteClass)
    {
        return self::$boundedClasses[$abstractClass] = $concreteClass($this);
    }

    public function singleton(string $abstractClass, callable $concreteClass)
    {
        return self::$singletonClasses[$abstractClass] = $concreteClass($this);
    }

    public function make(string $concreteClassDefinition)
    {
        $class = self::$boundedClasses[$concreteClassDefinition] ?? self::$singletonClasses[$concreteClassDefinition];

        return $class ?: throw new \RuntimeException('Container is not aware of requested class');
    }
}