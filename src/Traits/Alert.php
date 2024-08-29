<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Traits;

use Hindbiswas\Convo\Enums\Color;

trait Alert
{
    private function sayWithLabel(string $message, string $label, Color $color)
    {
        $label = $this->paint(' ' . $label . ' ', $color);
        $this->engine->put("\n" . $label . ' ' . $message . "\n\n");
    }

    public function alertInfo(string $message)
    {
        $this->sayWithLabel($message, 'INFO', Color::BG_BLUE);
    }

    public function alertWarning(string $message)
    {
        $this->sayWithLabel($message, 'WARNING', Color::BG_YELLOW);
    }

    public function alertError(string $message)
    {
        $this->sayWithLabel($message, 'ERROR', Color::BG_RED);
    }

    public function alertSuccess(string $message)
    {
        $this->sayWithLabel($message, 'SUCCESS', Color::BG_GREEN);
    }
}
