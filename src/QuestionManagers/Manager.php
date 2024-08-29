<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\QuestionManagers;

class Manager
{
    protected array $examples = [];
    protected mixed $default_value; 

    public function example(string|int|float ...$example)
    {
        $this->examples = array_map(fn($value): string => (string)$value, $example);
        return $this;
    }

    public function default(mixed $value)
    {
        $this->default_value = $value;
    }
}
