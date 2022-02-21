<?php

declare(strict_types=1);

namespace Abstracts;

/**
 * This is the base class that all test classes must inherit from.
 */
abstract class Test
{
  private static bool $hasBeenInvoked = false;
  private int $assertionsRan = 0;
  private array $errorMessages = [];

  public function __construct()
  {
    if (!self::$hasBeenInvoked) {
      echo "\n";
      self::$hasBeenInvoked = true;
    }

    $testsRan = 0;
    $output = "";

    $this->runBefore();

    foreach (get_class_methods($this) as $method) {
      if (str_starts_with($method, "test")) {
        $this->runBeforeEach();

        $testsRan++;
        $this->$method();

        if ($this->assertionsRan < 1) {
          $output .= "  ▶️ $method\n";
          $output .= "    ▶️ No assertions were run\n";
        }

        if (count($this->errorMessages) > 0) {
          $output .= "  ▶️ $method\n";

          foreach ($this->errorMessages as $error) {
            $output .= "    ▶️ $error\n";
          }
        }

        $this->assertionsRan = 0;
        $this->errorMessages = [];

        $this->runAfterEach();
      }
    }

    $this->runAfter();

    if ($testsRan < 1) {
      $output .= "  ▶️ No tests were run\n";
    }

    if ($output === "") {
      echo "✔️  $this\n";
      return;
    }

    echo "❌ $this\n$output";
  }

  protected function isTrue(
    mixed $value,
    string $message = "Should be true"
  ): void {
    $this->assertionsRan++;

    if ($value !== true) {
      $this->setError($message);
    }
  }

  protected function isFalse(
    mixed $value,
    string $message = "Should be false"
  ): void {
    $this->assertionsRan++;

    if ($value !== false) {
      $this->setError($message);
    }
  }

  protected function isTruthy(
    mixed $value,
    string $message = "Should be truthy"
  ): void {
    $this->assertionsRan++;

    if (!!$value !== true) {
      $this->setError($message);
    }
  }

  protected function isFalsy(
    mixed $value,
    string $message = "Should be falsy"
  ): void {
    $this->assertionsRan++;

    if (!!$value !== false) {
      $this->setError($message);
    }
  }

  protected function isIdentical(
    mixed $firstValue,
    mixed $secondValue,
    string $message = "Should be identical"
  ): void {
    $this->assertionsRan++;

    if ($firstValue !== $secondValue) {
      $this->setError($message);
    }
  }

  /**
   * @param \Closure $throwingFunction A function that should throw a throwable.
   * @param string $instanceOf The name of the class that the thrown throwable
   * must be an instance of.
   */
  protected function throws(
    \Closure $throwingFunction,
    string $message = "Should throw throwable",
    string $instanceOf = null
  ): void {
    $this->assertionsRan++;

    try {
      $throwingFunction();
    } catch (\Throwable $throwable) {
      if ($instanceOf !== null && !($throwable instanceof $instanceOf)) {
        $this->setError($message);
      }

      return;
    }

    $this->setError($message);
  }

  private function setError(string $message): void
  {
    $lineNumber = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]["line"];
    array_push($this->errorMessages, "Line $lineNumber: $message");
  }

  public function __toString(): string
  {
    return $this::class;
  }

  public function __call($name, $arguments): void
  {
  }
}
