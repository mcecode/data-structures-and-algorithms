<?php

declare(strict_types=1);

namespace Ciphers;

use Interfaces\Cipher;
use Lib\Strings;

/**
 * This implementation of the Caesar cipher was inspired by
 * https://github.com/trekhleb/javascript-algorithms/blob/9bb60fa72f9d146e931b4634764dff7aebc7c1a2/src/algorithms/cryptography/caesar-cipher/caesarCipher.js
 */
class CeasarCipher implements Cipher
{
  private const DEFAULT_ALPHABET = "abcdefghijklmnopqrstuvwxyz" .
    "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

  private array $cipher_map = [];
  private array $plain_map = [];

  /**
   * @param int $shift Rotates `$alphabet` by the set amount. A positive
   * integer rotates it to the right, while a negative number to rotates it to
   * the left.
   */
  public function __construct(
    int $shift = 3,
    string $alphabet = self::DEFAULT_ALPHABET
  ) {
    if ($alphabet === "") {
      throw new \ValueError("'\$alphabet' must not be empty.");
    }

    $alphabet = Strings::split($alphabet);

    // Handle shifts that are larger than the length of '$alphabet'.
    $alphabet_length = count($alphabet);
    $shift = $shift > $alphabet_length || $shift < -$alphabet_length ?
      $shift - (((int) ($shift / $alphabet_length)) * $alphabet_length) :
      $shift;

    $shifted_alphabet = [
      ...array_slice($alphabet, $shift),
      ...array_slice($alphabet, 0, $shift)
    ];

    foreach ($alphabet as $index => $character) {
      $this->cipher_map[$character] = $shifted_alphabet[$index];
    }

    $this->plain_map = array_flip($this->cipher_map);
  }

  public function encrypt(string $plain_text): string
  {
    $cipher_text = "";

    foreach (Strings::split($plain_text) as $character) {
      $cipher_text .= $this->cipher_map[$character] ?? $character;
    }

    return $cipher_text;
  }

  public function decrypt(string $cipher_text): string
  {
    $plain_text = "";

    foreach (Strings::split($cipher_text) as $character) {
      $plain_text .= $this->plain_map[$character] ?? $character;
    }

    return $plain_text;
  }
}
