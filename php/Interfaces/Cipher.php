<?php

declare(strict_types=1);

namespace Interfaces;

interface Cipher
{
  public function encrypt(string $plainText): string;
  public function decrypt(string $cipheText): string;
}
