<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\QuestionManagers;

use Hindbiswas\Convo\Conversation;
use Hindbiswas\Convo\Enums\Color;

class BasicManager extends Manager implements ManagerInterface
{
    public function __construct(private string $text, private Conversation $convo) {

    }

    public function ask()
    {
        $prompt = $this->text;

        if (!empty($this->examples)) {
            $examples = " (e.g. " . implode(', ', $this->examples) . ") ";
            $examples = $this->convo->paint($examples, Color::LIGHT_GREY);
            $prompt .= $examples;
        }
       
        $input = $this->convo->engine->get($prompt);
        return (isset($this->default_value) && $input === '') ? $this->default_value : $input;
    }
}
