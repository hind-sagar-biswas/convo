<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Engines;

use Hindbiswas\Convo\Enums\Color;
use Hindbiswas\Convo\Enums\DataType;

class SmartEngine
{
    // public function __construct(public bool $strict_mode = false) {}
    
    private function listToArray(string $string): array
    {
        $key = mt_rand(0, 9999);
        // Replace escaped characters with a unique placeholder
        $slash_placeholder = "##SLASH##$key##";
        $comma_placeholder = "##COMMA##$key##";
        $space_placeholder = "##SPACE##$key##";
        $string = str_replace('\\\\', $slash_placeholder, $string);
        $string = str_replace('\,', $comma_placeholder, $string);
        $string = str_replace('\\ ', $space_placeholder, $string);

        // Split the string by commas
        $parts = explode(',', $string);

        // Trim spaces and replace the placeholders back with a comma and space
        $result = array_map(function ($item) use ($slash_placeholder, $comma_placeholder, $space_placeholder) {
            $item = str_replace($slash_placeholder, '\\', trim($item));
            $item = str_replace($comma_placeholder, ',', trim($item));
            return str_replace($space_placeholder, ' ', trim($item));
        }, $parts);

        return $result;
    }

    private function getInt(string $input): ?int
    {
        // if (is_numeric($input)) {
        //     if ($this->strict_mode) return (!str_contains($input, '.')) ? (int)$input : null;
        //     return round((float)$input);
        // }
        return (is_numeric($input) && !str_contains($input, '.')) ? (int)$input : null;
    }

    private function getFloat(string $input): ?float
    {
        return (is_numeric($input)) ? (float)$input : null; 
    }

    public function getBool(string $input): ?bool
    {
        $truthy_values = ['true', 't', '1', 'y', 'yes'];
        $falsy_values = ['false', 'f', '0', 'n', 'no'];
        $input = strtolower($input);

        if (in_array($input, $truthy_values)) return true;
        if (in_array($input, $falsy_values)) return false;
        return null;
    }

    public function put(string $text)
    {
        if (substr($text, -1) !== "\n" || substr($text, -2) === "\\n") $text .= "\n";
        echo $text;
    }

    public function get(string $prompt, DataType $data_type = DataType::STR): string|bool|int|float|null
    {
        $input = readline($prompt . ' ');
        return match ($data_type) {
            DataType::STR => $input,
            DataType::INT => $this->getInt($input),
            DataType::BOOL => $this->getBool($input),
            DataType::FLOAT => $this->getFloat($input),
            DataType::LIST => $this->listToArray($input),
            DataType::JSON => json_validate($input) ? $input : null,
        };
    }

    public function paint(string $text, Color $color): string
    {
        return $color->value . $text . Color::RESET->value;
    }
}
