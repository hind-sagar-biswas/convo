<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\QuestionManagers;

class Manager
{
    protected array $examples = [];

    public function example(string|int|float ...$example)
    {
        $this->examples = array_map(fn($value): string => (string)$value, $example);
        return $this;
    }
}
