<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Traits;

use Hindbiswas\Convo\Engines\AutoEngine;
use Hindbiswas\Convo\Engines\BasicEngine;
use Hindbiswas\Convo\QuestionManagers\AutoManager;
use Hindbiswas\Convo\QuestionManagers\BasicManager;
use Hindbiswas\Convo\QuestionManagers\SmartManager;

trait QuestionManager
{
    public function ask(string $prompt)
    {
        return $this->engine->get($prompt);
    }

    public function prompt(string $text): BasicManager|AutoManager|SmartManager
    {
        if ($this->engine instanceof BasicEngine) return new BasicManager($text, $this);
        if ($this->engine instanceof AutoEngine) return new AutoManager($text, $this);
        return new SmartManager($text, $this);
    }
}
