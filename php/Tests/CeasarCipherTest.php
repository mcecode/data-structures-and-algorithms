<?php

declare(strict_types=1);

namespace Tests;

use Ciphers\CeasarCipher;
use Tests\Base\Test;

class CeasarCipherTest extends Test
{
  protected function run(): void
  {
    $this->throws(
      fn () => new CeasarCipher(alphabet: ""),
      "Should throw value error when alphabet is an empty string",
      \ValueError::class
    );

    // Plain text for default alphabet
    $plainText = "amzAMZ";

    // Default options
    $expectedCipherText = "dpCDPc";
    $ceasarCipher = new CeasarCipher();
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    //==================================================
    // Custom shifts
    //==================================================

    // Expected cipher text for positive shifts
    $expectedCipherText = "frEFRe";

    // Positive shift
    $ceasarCipher = new CeasarCipher(5);
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    // Large positive shift; 161 should be equivalent to 5
    $ceasarCipher = new CeasarCipher(161);
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    // Expected cipher text for negative shifts
    $expectedCipherText = "WivwIV";

    // Negative shift
    $ceasarCipher = new CeasarCipher(-4);
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    // Large negative shift; -160 should be equivalent to -4
    $ceasarCipher = new CeasarCipher(-160);
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    //==================================================
    // Custom alphabet
    //==================================================

    // Russian, taken from https://en.wikipedia.org/wiki/Russian_alphabet
    $plainText = "айфяАЙФЯ";
    $expectedCipherText = "гмчВГМЧв";
    $ceasarCipher = new CeasarCipher(
      alphabet: "абвгдеёжзийклмнопрстуфхцчшщъыьэюя" .
        "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ"
    );
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    // Kanji, taken from
    // https://www.thoughtco.com/the-most-frequently-used-kanji-2028155
    $plainText = "会同県";
    $expectedCipherText = "生新意";
    $ceasarCipher = new CeasarCipher(alphabet: "会長国生東同高見新民県政相意党");
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    // Emoji
    // This is commented out because I want to support alphabets with
    // characters composed of multiple Unicode code points, such as emojis or
    // Hindi scripts. However, I have not found a good solution to implement
    // it yet.
    // $plainText = "😃🗺️🏴‍☠️";
    // $expectedCipherText = "🎁👨‍👩‍👦‍👦🌷";
    // $ceasarCipher = new CeasarCipher(alphabet: "😃😁🌷🎁🗺️🏛️🤷‍♂️👨‍👩‍👦‍👦🏳️‍🌈🏴‍☠️");
    // $cipherText = $ceasarCipher->encrypt($plainText);
    // $this->isIdentical($cipherText, $expectedCipherText);
    // $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);

    // Characters outside the alphabet
    $plainText = "@amz!AMZ?";
    $expectedCipherText = "@dpC!DPc?";
    $ceasarCipher = new CeasarCipher();
    $cipherText = $ceasarCipher->encrypt($plainText);
    $this->isIdentical($cipherText, $expectedCipherText);
    $this->isIdentical($ceasarCipher->decrypt($cipherText), $plainText);
  }
}
