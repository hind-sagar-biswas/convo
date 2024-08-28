<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use Hindbiswas\Convo\Conversation;
use Hindbiswas\Convo\Enums\Engine;


$basic_convo = new Conversation(Engine::BASIC);
$auto_convo = new Conversation(Engine::AUTO);
$smart_convo = new Conversation(Engine::SMART);

// All Speaker Methods with Basic Engine
$smart_convo->alertInfo('BASIC Engine');

$basic_convo->say('This is say()');
$basic_convo->inform('This is inform()');
$basic_convo->warn('This is warn()');
$basic_convo->success('This is success()');
$basic_convo->error('This is error()');

$basic_convo->number(69);
$basic_convo->number(6.9);
$basic_convo->number('69');
$basic_convo->number('6n9');

$basic_convo->boolean(true);
$basic_convo->boolean(false);

$basic_convo->dump([1, 2, "3", 6.9, true, null, ['hello' => 'dump']]);

// All Speaker Methods with Auto Engine
$smart_convo->alertInfo('AUTO Engine');

$auto_convo->say('This is say()');
$auto_convo->inform('This is inform()');
$auto_convo->warn('This is warn()');
$auto_convo->success('This is success()');
$auto_convo->error('This is error()');

$auto_convo->number(69);
$auto_convo->number(6.9);
$auto_convo->number('69');
$auto_convo->number('6n9');

$auto_convo->boolean(true);
$auto_convo->boolean(false);

$auto_convo->dump([1, 2, "3", 6.9, true, null, ['hello' => 'dump']]);

// All Speaker Methods with Smart Engine
$smart_convo->alertInfo('SMART Engine');

$smart_convo->say('This is say()');
$smart_convo->inform('This is inform()');
$smart_convo->warn('This is warn()');
$smart_convo->success('This is success()');
$smart_convo->error('This is error()');

$smart_convo->number(69);
$smart_convo->number(6.9);
$smart_convo->number('69');
$smart_convo->number('6n9');

$smart_convo->boolean(true);
$smart_convo->boolean(false);

$smart_convo->dump([1, 2, "3", 6.9, true, null, ['hello' => 'dump']]);
