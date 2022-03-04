<?php

declare(strict_types=1);

namespace Ciphers;

use ValueError;

use Lib\Strings;

/**
 * This Caesar cipher implementation was inspired by
 * https://github.com/trekhleb/javascript-algorithms/blob/9bb60fa72f9d146e931b4634764dff7aebc7c1a2/src/algorithms/cryptography/caesar-cipher/caesarCipher.js
 */
class CeasarCipher implements Cipher
{
  private const DEFAULT_ALPHABET = "abcdefghijklmnopqrstuvwxyz" .
    "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

  private array $cipherMap = [];
  private array $plainMap = [];

  /**
   * @param int $shift Rotates `$alphabet` by the set amount. A positive
   * integer rotates it to the right, while a negative number rotates it to the
   * left.
   */
  public function __construct(
    int $shift = 3,
    string $alphabet = self::DEFAULT_ALPHABET
  ) {
    if ($alphabet === "") {
      throw new ValueError("'\$alphabet' must not be empty.");
    }

    $alphabet = Strings::split($alphabet);

    // Handle shifts that are larger than the length of '$alphabet'.
    $alphabetLength = count($alphabet);
    $shift = $shift > $alphabetLength || $shift < -$alphabetLength ?
      $shift - (((int) ($shift / $alphabetLength)) * $alphabetLength) :
      $shift;

    $shiftedAlphabet = [
      ...array_slice($alphabet, $shift),
      ...array_slice($alphabet, 0, $shift)
    ];

    foreach ($alphabet as $index => $character) {
      $this->cipherMap[$character] = $shiftedAlphabet[$index];
    }

    $this->plainMap = array_flip($this->cipherMap);
  }

  public function encrypt(string $plainText): string
  {
    $cipherText = "";

    foreach (Strings::split($plainText) as $character) {
      $cipherText .= $this->cipherMap[$character] ?? $character;
    }

    return $cipherText;
  }

  public function decrypt(string $cipherText): string
  {
    $plainText = "";

    foreach (Strings::split($cipherText) as $character) {
      $plainText .= $this->plainMap[$character] ?? $character;
    }

    return $plainText;
  }
}
