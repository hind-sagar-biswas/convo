<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\QuestionManagers;

use Hindbiswas\Convo\Conversation;

interface ManagerInterface {
    public function __construct(string $text, Conversation $convo);
    public function ask();
}