<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use Hindbiswas\Convo\Conversation;
use Hindbiswas\Convo\Enums\Engine;


$convo = new Conversation(Engine::BASIC);

$name = $convo->prompt("What's your name?")->example('John Doe', 'Jane Doe')->ask();
$age = $convo->ask("And what is your age?");
$convo->say("I see dear $name, you are $age y/o;\n");