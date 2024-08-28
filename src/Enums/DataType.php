<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Enums;

enum DataType: string {
    case INT = 'int';
    case STR = 'string';
    case BOOL = 'bool';
    case LIST = 'list';
    case JSON = 'json';
    case FLOAT = 'float';
}