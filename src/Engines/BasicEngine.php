<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Engines;

use Hindbiswas\Convo\Enums\Color;

class BasicEngine
{
    public function put(string $text) {
        echo $text;
    }
    
    public function get(string $prompt) {
        return readline($prompt . ' ');
    }
}
