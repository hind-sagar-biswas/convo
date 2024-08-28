<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Traits;

use Hindbiswas\Convo\Enums\Color;

trait Alert {
    private function sayWithLabel(string $message, string $label, Color $color)
    {
        $label = $this->engine->paint(' ' . $label . ' ', $color);
        $this->engine->put($label . ' ' . $message . '\n');
    }

    public function inform(string $message) {
        $this->sayWithLabel($message, 'INFO', Color::BG_BLUE);
    }

    public function warn(string $message)
    {
        $this->sayWithLabel($message, 'WARNING', Color::BG_YELLOW);
    }

    public function error(string $message)
    {
        $this->sayWithLabel($message, 'ERROR', Color::BG_RED);
    }

    public function success(string $message)
    {
        $this->sayWithLabel($message, 'SUCCESS', Color::BG_GREEN);
    }
}