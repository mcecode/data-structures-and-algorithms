<?php

declare(strict_types=1);

namespace Tests\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Test
{
  public function __construct()
  {
    throw new \RuntimeException(
      "Test Attributes should not be instantiated",
      E_ERROR
    );
  }
}
