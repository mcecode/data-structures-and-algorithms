<?php

declare(strict_types=1);

namespace Lib;

/**
 * This console implementation was inspired by
 * https://github.com/coryjthompson/php-console-color/blob/83236b34a732ac4ae975cf67ba21a4640f96bc1e/Console.php
 * and informed by
 * https://stackoverflow.com/a/34034922
 */
enum Console: string
{
  case Default = "39";
  case White = "97";
  case Black = "30";
  case Gray = "90";
  case Red = "31";
  case Green = "32";
  case Yellow = "33";
  case Blue = "34";
  case Magenta = "35";
  case Cyan = "36";
  case LightGray = "37";
  case LightRed = "91";
  case LightGreen = "92";
  case LightYellow = "93";
  case LightBlue = "94";
  case LightMagenta = "95";
  case LightCyan = "96";

  public function write(string $text): void
  {
    echo "\033[{$this->value}m$text\033[0m";
  }

  public function writeLine(string $text): void
  {
    echo "\033[{$this->value}m$text\033[0m" . PHP_EOL;
  }

  public static function writeNewLine(int $count = 1): void
  {
    for ($i = 0; $i < $count; $i++) {
      echo PHP_EOL;
    }
  }
}
