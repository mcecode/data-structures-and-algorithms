<?php

declare(strict_types=1);

namespace Tests;

use Lib\Console;
use Tests\Base\TestCase;

class ConsoleTest extends TestCase
{
  protected function runBefore(): void
  {
    ob_start();
  }

  protected function runAfterEach(): void
  {
    ob_clean();
  }

  protected function runAfter(): void
  {
    ob_end_clean();
  }

  protected function testWrite(): void
  {
    Console::Default->write("default");
    Console::Green->write("green");
    Console::LightBlue->write("lightblue");

    $this->isIdentical(
      "\033[39mdefault\033[0m" .
        "\033[32mgreen\033[0m" .
        "\033[94mlightblue\033[0m",
      ob_get_contents()
    );
  }

  protected function testWriteLine(): void
  {
    Console::White->writeLine("white");
    Console::Yellow->writeLine("yellow");
    Console::LightRed->writeLine("lightred");

    $this->isIdentical(
      "\033[97mwhite\033[0m" . PHP_EOL .
        "\033[33myellow\033[0m" . PHP_EOL .
        "\033[91mlightred\033[0m" . PHP_EOL,
      ob_get_contents()
    );
  }

  protected function testWriteNewLine(): void
  {
    Console::writeNewLine();
    Console::writeNewLine(0);
    Console::writeNewLine(-1);
    Console::writeNewLine(1);
    Console::writeNewLine(3);
    Console::writeNewLine(-3);

    $this->isIdentical(
      PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL,
      ob_get_contents()
    );
  }
}
