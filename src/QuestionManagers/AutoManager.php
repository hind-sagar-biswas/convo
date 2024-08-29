<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\QuestionManagers;

use Hindbiswas\Convo\Conversation;

class AutoManager extends Manager implements ManagerInterface {
    public function __construct(private string $text, private Conversation $convo) {} 

    public function ask()
    {
        
    }
}