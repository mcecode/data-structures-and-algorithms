<?php

declare(strict_types=1);

namespace Ciphers;

use Abstracts\Test;

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
    $plain_text = "amzAMZ";

    // Default options
    $expected_cipher_text = "dpCDPc";
    $ceasar_cipher = new CeasarCipher();
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    //==================================================
    // Custom shifts
    //==================================================

    // Expected cipher text for positive shifts
    $expected_cipher_text = "frEFRe";

    // Positive shift
    $ceasar_cipher = new CeasarCipher(5);
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    // Large positive shift; 161 should be equivalent to 5
    $ceasar_cipher = new CeasarCipher(161);
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    // Expected cipher text for negative shifts
    $expected_cipher_text = "WivwIV";

    // Negative shift
    $ceasar_cipher = new CeasarCipher(-4);
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    // Large negative shift; -160 should be equivalent to -4
    $ceasar_cipher = new CeasarCipher(-160);
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    //==================================================
    // Custom alphabet
    //==================================================

    // Russian, taken from https://en.wikipedia.org/wiki/Russian_alphabet
    $plain_text = "айфяАЙФЯ";
    $expected_cipher_text = "гмчВГМЧв";
    $ceasar_cipher = new CeasarCipher(
      alphabet: "абвгдеёжзийклмнопрстуфхцчшщъыьэюя" .
        "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ"
    );
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    // Kanji, taken from
    // https://www.thoughtco.com/the-most-frequently-used-kanji-2028155
    $plain_text = "会同県";
    $expected_cipher_text = "生新意";
    $ceasar_cipher = new CeasarCipher(alphabet: "会長国生東同高見新民県政相意党");
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    // Emoji
    // This is commented out because I want to support alphabets with
    // characters composed of multiple Unicode code points, such as emojis or
    // Hindi scripts. However, I have not found a good solution to implement
    // it yet.
    // $plain_text = "😃🗺️🏴‍☠️";
    // $expected_cipher_text = "🎁👨‍👩‍👦‍👦🌷";
    // $ceasar_cipher = new CeasarCipher(alphabet: "😃😁🌷🎁🗺️🏛️🤷‍♂️👨‍👩‍👦‍👦🏳️‍🌈🏴‍☠️");
    // $cipher_text = $ceasar_cipher->encrypt($plain_text);
    // $this->isTruthy($cipher_text === $expected_cipher_text);
    // $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);

    // Characters outside the alphabet
    $plain_text = "@amz!AMZ?";
    $expected_cipher_text = "@dpC!DPc?";
    $ceasar_cipher = new CeasarCipher();
    $cipher_text = $ceasar_cipher->encrypt($plain_text);
    $this->isTruthy($cipher_text === $expected_cipher_text);
    $this->isTruthy($ceasar_cipher->decrypt($cipher_text) === $plain_text);
  }
}
