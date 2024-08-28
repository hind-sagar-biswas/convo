<?php

declare(strict_types=1);

namespace Hindbiswas\Convo;

use Hindbiswas\Convo\Enums\Engine;

class Conversation {
    public readonly BasicEngine|AutoEngine|SmartEngine $engine;

    public function __construct(Engine $engine = Engine::BASIC) {
        $this->engine = match ($engine) {
            Engine::BASIC => new BasicEngine(),
            Engine::AUTO => new AutoEngine(),
            Engine::SMART => new SmartEngine(),
        };
    }
}