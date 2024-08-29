<?php

declare(strict_types=1);

namespace Hindbiswas\Convo;

use Hindbiswas\Convo\Enums\Color;
use Hindbiswas\Convo\Enums\Engine;
use Hindbiswas\Convo\Traits\Alert;
use Hindbiswas\Convo\Traits\Speaker;
use Hindbiswas\Convo\Engines\AutoEngine;
use Hindbiswas\Convo\Engines\BasicEngine;
use Hindbiswas\Convo\Engines\SmartEngine;

class Conversation {
    use Speaker, Alert;

    public readonly BasicEngine|AutoEngine|SmartEngine $engine;

    public function __construct(Engine $engine = Engine::BASIC) {
        $this->engine = match ($engine) {
            Engine::BASIC => new BasicEngine(),
            Engine::AUTO => new AutoEngine(),
            Engine::SMART => new SmartEngine(),
        };
    }

    public function paint(string $text, Color $color): string
    {
        return $color->value . $text . Color::RESET->value;
    } 
}