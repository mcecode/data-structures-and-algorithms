<?php

declare(strict_types=1);

namespace Interfaces;

interface Cipher
{
  public function encrypt(string $plain_text): string;
  public function decrypt(string $ciphe_text): string;
}
