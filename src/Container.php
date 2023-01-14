<?php

namespace ServiceContainer;

class Container
{
    static $singletonClasses = [];
    static $boundedClasses = [];

    public function bind(string $abstractClass, callable $concreteClass)
    {
        return self::$boundedClasses[$abstractClass] = $concreteClass;
    }

    public function singleton(string $abstractClass, callable $concreteClass)
    {
        return self::$singletonClasses[$abstractClass] = $concreteClass($this);
    }

    public function make(string $concreteClassDefinition)
    {
        if(isset($concreteClassDefinition, self::$boundedClasses)) {
            return self::$boundedClasses[$concreteClassDefinition]($this);
        }

        if(isset($concreteClassDefinition, self::$singletonClasses)) {
            return self::$boundedClasses[$concreteClassDefinition];
        }

        return throw new \RuntimeException('Container is not aware of requested class');
    }
}