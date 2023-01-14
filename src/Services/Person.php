<?php

namespace ServiceContainer\Services;

use ServiceContainer\Container;

class Person
{

    private Container $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function greet(): void
    {
        $greeting = $this->app->make(Greetings::class);

        echo $greeting->saySomething('I will make it!');
    }
}