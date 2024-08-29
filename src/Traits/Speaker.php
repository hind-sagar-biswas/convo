<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Traits;

use Hindbiswas\Convo\Engines\AutoEngine;
use Hindbiswas\Convo\Engines\BasicEngine;
use Hindbiswas\Convo\Enums\Color;

trait Speaker
{
    public function say(string $message)
    {
        $this->engine->put($message);
    }

    public function inform(string $message)
    {
        $this->engine->put($this->paint($message, Color::BLUE));
    }

    public function warn(string $message)
    {
        $this->engine->put($this->paint($message, Color::YELLOW));
    }

    public function success(string $message)
    {
        $this->engine->put($this->paint($message, Color::GREEN));
    }

    public function error(string $message)
    {
        $this->engine->put($this->paint($message, Color::RED));
    }

    public function number(int|float|string $number, bool $say = true)
    {
        if (!is_numeric($number)) {
            $code = $this->paint('`Hindbiswas\Convo\Conversation->number()`', Color::BLUE);
            $provided = $this->paint("`$number`", Color::RED);
            $this->alertError($code . " expects a numeric value but $provided provided!");
            return null;
        }

        $number = $this->paint((string)$number, Color::YELLOW);
        if (!$say) return $number;
        $this->engine->put($number);
    }

    public function boolean(bool $boolean, bool $say = true)
    {
        $boolean = $this->paint($boolean ? 'true' : 'false', Color::GREEN);
        if (!$say) return $boolean;
        $this->engine->put($boolean);
    }

    private function string(string $text)
    {
        return $this->paint("\"$text\"", Color::LIGHT_GREY);
    }

    private function null()
    {
        return $this->paint("null", Color::LIGHT_MAGENTA);
    }

    private function smartArray(array|object $data, int $level = 0): string
    {
        $parsed = '';
        $prefix = '';
        for ($i = 0; $i < $level; $i++) $prefix .= ' ';

        foreach ($data as $key => $value) {
            if (is_array($value)) $parsed .= $prefix . "[$key] => [array]\n" . $this->smartArray($value, $level + 1) . "\n";
            else if (is_object($value)) $parsed .= $prefix . "[$key] => [object]\n" . $this->smartArray($value, $level + 1) . "\n";
            elseif (is_int($value) || is_float($value)) $parsed .= $prefix . "[$key] => " . $this->number($value, false) . "\n";
            elseif (is_bool($value)) $parsed .= $prefix . "[$key] => " . $this->boolean($value, false) . "\n";
            elseif (is_string($value)) $parsed .= $prefix . "[$key] => " . $this->string($value) . "\n";
            elseif (is_null($value)) $parsed .= $prefix . "[$key] => " . $this->null() . "\n";
        }

        return $parsed;
    }

    public function dump(array $data)
    {
        if ($this->engine instanceof BasicEngine) {
            $code = $this->paint('`Hindbiswas\Convo\Enums\Engine::BASIC`', Color::BLUE);
            $this->alertError("$code does not allow dumping");
        } else if ($this->engine instanceof AutoEngine) $this->engine->put($data);
        else $this->engine->put($this->smartArray($data));
    }
}
