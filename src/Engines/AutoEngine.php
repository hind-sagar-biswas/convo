<?php

declare(strict_types=1);

namespace Hindbiswas\Convo;

use Hindbiswas\Convo\Enums\Color;
use Hindbiswas\Convo\Enums\DataType;

class AutoEngine
{
    public function put(string|int|float|array $data)
    {
        if (is_array($data)) {
            print_r($data);
            return;
        }
        $text = (string)$data;
        if (substr($text, -1) !== "\n" || substr($text, -2) === "\\n") $text .= "\n";
        echo $text;
    }

    public function get(string $prompt, DataType $data_type = DataType::STR)
    {
        $input = readline($prompt . ' ');
        return match ($data_type) {
            DataType::STR => $input,
            DataType::INT => (int)$input,
            DataType::FLOAT => (float)$input,
            DataType::BOOL => (bool)$input,
            DataType::LIST => explode(', ', $input),
            DataType::JSON => json_validate($input) ? $input : null,
        };
    }

    public function paint(string $text, Color $color): string
    {
        return $color->value . $text . Color::RESET;
    }
}
