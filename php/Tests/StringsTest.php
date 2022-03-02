<?php

declare(strict_types=1);

namespace Tests;

use Lib\Strings;
use Tests\Base\TestCase;

class StringsTest extends TestCase
{
  protected function testSplit(): void
  {
    $this->isIdentical(Strings::split(""), []);
    $this->isIdentical(Strings::split("abcde"), ["a", "b", "c", "d", "e"]);
    $this->isIdentical(Strings::split("абвгд"), ["а", "б", "в", "г", "д"]);
    $this->isIdentical(Strings::split("会長国生東"), ["会", "長", "国", "生", "東"]);
  }
}
