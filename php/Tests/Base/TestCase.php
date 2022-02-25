<?php

declare(strict_types=1);

namespace Tests\Base;

use Closure;
use ReflectionObject;
use Throwable;

use Lib\Console;
use Tests\Attributes\Skip;
use Tests\Attributes\Test;
use Tests\Attributes\Todo;

/**
 * This is the base class that all test classes must inherit from.
 */
abstract class TestCase
{
  private static bool $hasBeenInvoked = false;
  private int $assertionsRan = 0;
  private bool $isTestPassing = false;
  private array $failedAssertionMessages = [];

  public function __construct()
  {
    if (!self::$hasBeenInvoked) {
      Console::writeNewLine();
      self::$hasBeenInvoked = true;
    }

    $testMethods = [];
    $testsTodo = 0;
    $skippedTests = 0;

    foreach ((new ReflectionObject($this))->getMethods() as $method) {
      if (
        str_starts_with($method->getName(), "test") ||
        count($method->getAttributes(Test::class)) > 0
      ) {
        if (count($method->getAttributes(Skip::class)) > 0) {
          $skippedTests++;
          continue;
        }

        if (count($method->getAttributes(Todo::class)) > 0) {
          $testsTodo++;
          continue;
        }

        array_push($testMethods, $method->getName());
      }
    }

    $testsRan = 0;
    $failedTests = 0;
    $failedTestsOutput = "";

    $this->runBefore();

    foreach ($testMethods as $method) {
      $this->runBeforeEach();

      $testsRan++;
      $this->$method();

      if (!$this->isTestPassing) {
        if ($this->assertionsRan < 1) {
          $failedTests++;

          $failedTestsOutput .= "    ▶️ $method" . PHP_EOL;
          $failedTestsOutput .= "      ▶️ No assertions were run" . PHP_EOL;
        }

        if (count($this->failedAssertionMessages) > 0) {
          $failedTests++;

          $failedTestsOutput .= "    ▶️ $method" . PHP_EOL;
          foreach ($this->failedAssertionMessages as $message) {
            $failedTestsOutput .= "      ▶️ $message" . PHP_EOL;
          }
        }
      }

      $this->assertionsRan = 0;
      $this->isTestPassing = false;
      $this->failedAssertionMessages = [];

      $this->runAfterEach();
    }

    $this->runAfter();

    if ($testsRan < 1) {
      $failedTestsOutput .= "  ▶️ No tests were run" . PHP_EOL;
    }

    if ($failedTestsOutput === "") {
      Console::LightGreen->writeLine("✔️  $this");
    } else {
      Console::writeNewLine();
      Console::LightRed->writeLine("❌ $this");
    }

    if ($testsTodo > 0) {
      Console::LightCyan->writeLine("  ▶️ Tests to do: $testsTodo");
    }

    if ($skippedTests > 0) {
      Console::LightYellow->writeLine("  ▶️ Skipped tests: $skippedTests");
    }

    if ($failedTests > 0) {
      Console::LightRed->writeLine("  ▶️ Failed test: $failedTests");
    }

    if ($failedTestsOutput !== "") {
      Console::LightRed->writeLine($failedTestsOutput);
    }
  }

  protected function isTrue(
    mixed $value,
    string $message = "Should be true"
  ): bool {
    $this->assertionsRan++;

    if ($value !== true) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  protected function isFalse(
    mixed $value,
    string $message = "Should be false"
  ): bool {
    $this->assertionsRan++;

    if ($value !== false) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  protected function isTruthy(
    mixed $value,
    string $message = "Should be truthy"
  ): bool {
    $this->assertionsRan++;

    if ($value != true) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  protected function isFalsy(
    mixed $value,
    string $message = "Should be falsy"
  ): bool {
    $this->assertionsRan++;

    if ($value != false) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  protected function isEqual(
    mixed $firstValue,
    mixed $secondValue,
    string $message = "Should be equal"
  ): bool {
    $this->assertionsRan++;

    if ($firstValue != $secondValue) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  protected function isIdentical(
    mixed $firstValue,
    mixed $secondValue,
    string $message = "Should be identical"
  ): bool {
    $this->assertionsRan++;

    if ($firstValue !== $secondValue) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  /**
   * @param Closure $throwingFunction A function that should throw a throwable.
   * @param string $instanceOf The name of the class that the thrown throwable
   * must be an instance of.
   */
  protected function throws(
    Closure $throwingFunction,
    string $message = "Should throw throwable",
    string $instanceOf = null
  ): bool {
    $this->assertionsRan++;

    try {
      $throwingFunction();
    } catch (Throwable $throwable) {
      if ($instanceOf !== null && !($throwable instanceof $instanceOf)) {
        $this->setError($message);
      }

      return true;
    }

    $this->setError($message);
    return false;
  }

  protected function doesNotThrow(
    Closure $nonThrowingfunction,
    string $message = "Should not throw throwable"
  ): bool {
    $this->assertionsRan++;

    try {
      $nonThrowingfunction();
    } catch (Throwable $throwable) {
      $this->setError($message);
      return false;
    }

    return true;
  }

  protected function pass(): bool
  {
    return $this->isTestPassing = true;
  }

  protected function fail(string $message): bool
  {
    $this->assertionsRan++;

    $this->setError($message);
    return false;
  }

  private function setError(string $message): void
  {
    $lineNumber = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]["line"];
    array_push($this->failedAssertionMessages, "Line $lineNumber: $message");
  }

  public function __toString(): string
  {
    return $this::class;
  }

  public function __call($name, $arguments): void
  {
  }
}
