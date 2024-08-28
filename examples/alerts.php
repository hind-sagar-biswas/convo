<?php
declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use Hindbiswas\Convo\Conversation;
use Hindbiswas\Convo\Enums\Engine;


$convo = new Conversation(Engine::SMART);

$convo->alertInfo('This is an information');
$convo->alertError('This is an error');
$convo->alertWarning('This is a warning');
$convo->alertSuccess('This is a success');