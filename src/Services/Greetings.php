<?php

namespace ServiceContainer\Services;

class Greetings
{

    public function sayHello()
    {
        return "Hello";
    }

    public function saySomething($something)
    {
        return $something;
    }

}