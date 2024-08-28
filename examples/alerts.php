<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use Hindbiswas\Convo\Conversation;
use Hindbiswas\Convo\Enums\Engine;


$convo = new Conversation(Engine::SMART);

$convo->inform('This is an information');
$convo->success('This is a success');
$convo->warn('This is a warning');
$convo->error('This is an error');