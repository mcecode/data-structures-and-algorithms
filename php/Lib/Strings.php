<?php

declare(strict_types=1);

namespace Lib;

class Strings
{
  /**
   * This is equivalent to `str_split($string, 1)`, but with support for
   * mutltibyte strings.
   */
  public static function split(string $string): array
  {
    // Using 'preg_split' allows handling of mutltibyte strings without needing
    // the non-default 'mbstring' extension. This solution was taken from
    // https://stackoverflow.com/a/3666326
    return preg_split("//u", $string, flags: PREG_SPLIT_NO_EMPTY);
  }
}
