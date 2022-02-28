<?php

declare(strict_types=1);

namespace Tests;

use ValueError;

use Ciphers\CeasarCipher;
use Tests\Attributes\Skip;
use Tests\Base\TestCase;

class CeasarCipherTest extends TestCase
{
  private string $defaultAlphabetPlainText = "amzAMZ";
  private string $positiveShiftExpectedCipherText = "frEFRe";
  private string $negativeShiftExpectedCipherText = "WivwIV";

  protected function testDefaultOptions(): void
  {
    $cipher = new CeasarCipher();
    $cipherText = $cipher->encrypt($this->defaultAlphabetPlainText);

    $this->isIdentical($cipherText, "dpCDPc");
    $this->isIdentical(
      $cipher->decrypt($cipherText),
      $this->defaultAlphabetPlainText
    );
  }

  protected function testZeroShift(): void
  {
    $cipher = new CeasarCipher(0);
    $cipherText = $cipher->encrypt($this->defaultAlphabetPlainText);

    $this->isIdentical($cipherText, $this->defaultAlphabetPlainText);
    $this->isIdentical(
      $cipher->decrypt($cipherText),
      $this->defaultAlphabetPlainText
    );
  }

  protected function testPositiveShift(): void
  {
    $cipher = new CeasarCipher(5);
    $cipherText = $cipher->encrypt($this->defaultAlphabetPlainText);

    $this->isIdentical($cipherText, $this->positiveShiftExpectedCipherText);
    $this->isIdentical(
      $cipher->decrypt($cipherText),
      $this->defaultAlphabetPlainText
    );
  }

  protected function testLargePositiveShift(): void
  {
    $cipher = new CeasarCipher(161);
    $cipherText = $cipher->encrypt($this->defaultAlphabetPlainText);

    $this->isIdentical($cipherText, $this->positiveShiftExpectedCipherText);
    $this->isIdentical(
      $cipher->decrypt($cipherText),
      $this->defaultAlphabetPlainText
    );
  }

  protected function testNegativeShift(): void
  {
    $cipher = new CeasarCipher(-4);
    $cipherText = $cipher->encrypt($this->defaultAlphabetPlainText);

    $this->isIdentical($cipherText, $this->negativeShiftExpectedCipherText);
    $this->isIdentical(
      $cipher->decrypt($cipherText),
      $this->defaultAlphabetPlainText
    );
  }

  protected function testLargeNegativeShift(): void
  {
    $cipher = new CeasarCipher(-160);
    $cipherText = $cipher->encrypt($this->defaultAlphabetPlainText);

    $this->isIdentical($cipherText, $this->negativeShiftExpectedCipherText);
    $this->isIdentical(
      $cipher->decrypt($cipherText),
      $this->defaultAlphabetPlainText
    );
  }

  protected function testEmptyAlphabet(): void
  {
    $this->throws(
      fn () => new CeasarCipher(alphabet: ""),
      "Should throw value error when alphabet is an empty string",
      ValueError::class
    );
  }

  /**
   * Letters taken from
   * https://en.wikipedia.org/wiki/Russian_alphabet
   */
  protected function testRussianAlphabet(): void
  {
    $cipher = new CeasarCipher(
      alphabet: "абвгдеёжзийклмнопрстуфхцчшщъыьэюя" .
        "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ"
    );
    $plainText = "айфяАЙФЯ";
    $cipherText = $cipher->encrypt($plainText);

    $this->isIdentical($cipherText, "гмчВГМЧв");
    $this->isIdentical($cipher->decrypt($cipherText), $plainText);
  }

  /**
   * Letters taken from
   * https://www.thoughtco.com/the-most-frequently-used-kanji-2028155
   */
  protected function testKanjiAlphabet(): void
  {
    $cipher = new CeasarCipher(alphabet: "会長国生東同高見新民県政相意党");
    $plainText = "会同県";
    $cipherText = $cipher->encrypt($plainText);

    $this->isIdentical($cipherText, "生新意");
    $this->isIdentical($cipher->decrypt($cipherText), $plainText);
  }

  /**
   * This is skipped because I want to support alphabets with characters
   * composed of multiple Unicode code points, such as emojis or Hindi scripts.
   * However, I have not found a good solution to implement it yet.
   */
  #[Skip]
  protected function testEmojiAlphabet(): void
  {
    $cipher = new CeasarCipher(alphabet: "😃😁🌷🎁🗺️🏛️🤷‍♂️👨‍👩‍👦‍👦🏳️‍🌈🏴‍☠️");
    $plainText = "😃🗺️🏴‍☠️";
    $cipherText = $cipher->encrypt($plainText);

    $this->isIdentical($cipherText, "🎁👨‍👩‍👦‍👦🌷");
    $this->isIdentical($cipher->decrypt($cipherText), $plainText);
  }

  protected function testCharactersOutsideAlphabet(): void
  {
    $cipher = new CeasarCipher();
    $plainText = "@amz!AMZ?";
    $cipherText = $cipher->encrypt($plainText);

    $this->isIdentical($cipherText, "@dpC!DPc?");
    $this->isIdentical($cipher->decrypt($cipherText), $plainText);
  }
}
