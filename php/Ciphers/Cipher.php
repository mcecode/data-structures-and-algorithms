<?php

declare(strict_types=1);

namespace Ciphers;

interface Cipher
{
  public function encrypt(string $plainText): string;
  public function decrypt(string $cipheText): string;
}
