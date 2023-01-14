<?php

include 'vendor/autoload.php';

use ServiceContainer\Services\Greetings;
use ServiceContainer\Services\Person;
use ServiceContainer\Services\Woman;

$app = new ServiceContainer\Container();

$app->bind(Person::class, fn($container) => new Person($container));
$app->bind(Greetings::class, fn($container) => new Greetings());

$person = $app->make(Woman::class);

$person->greet();

