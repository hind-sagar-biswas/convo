<?php

declare(strict_types=1);

namespace Hindbiswas\Convo\Enums;

enum Color: string {
    case BLACK = "\e[0;30m";
    case WHITE = "\e[1;37m";
    case RED = "\e[0;31m";
    case GREEN = "\e[0;32m";
    case BROWN = "\e[0;33m";
    case YELLOW = "\e[1;33m";
    case BLUE = "\e[0;34m";
    case MAGENTA = "\e[0;35m";
    case CYAN = "\e[0;36m";

    case LIGHT_RED = "\e[1;31m";
    case LIGHT_GREEN = "\e[1;32m";
    case LIGHT_BLUE = "\e[1;34m";
    case LIGHT_MAGENTA = "\e[1;35m";
    case LIGHT_CYAN = "\e[1;36m";
    case LIGHT_GREY = "\e[0;37m";

    case DARK_GREY = "\e[1;30m";

    case BG_BLACK = "\e[1;37;40m";
    case BG_RED = "\e[1;37;41m";
    case BG_GREEN = "\e[1;37;42m";
    case BG_YELLOW = "\e[0;30;43m";
    case BG_BLUE = "\e[1;37;44m";
    case BG_MAGENTA = "\e[1;37;45m";
    case BG_CYAN = "\e[\e[0;30;46m";
    case BG_LIGHT_GREY = "\e[\e[0;30;47m";

    case RESET = "\e[0m";
}