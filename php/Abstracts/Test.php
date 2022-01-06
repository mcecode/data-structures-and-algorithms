<?php

declare(strict_types=1);

namespace Abstracts;

/**
 * This is the base class that all test classes must inherit from.
 */
abstract class Test
{
  /**
   * This is the method that will contain all test assertions.
   */
  abstract protected function run(): void;

  private static bool $hasBeenInvoked = false;
  private array $errors = [];

  public function __construct()
  {
    if (!self::$hasBeenInvoked) {
      echo "\n";
      self::$hasBeenInvoked = true;
    }

    $this->run();

    if (count($this->errors) <= 0) {
      echo "✔️  $this\n";
      return;
    }

    echo "❌ $this\n";

    foreach ($this->errors as $error) {
      echo "  $error\n";
    }

    $this->errors = [];
  }

  protected function isTruthy(
    mixed $value,
    string $message = "Should be truthy"
  ): void {
    if (!!$value !== true) {
      $this->setError($message);
    }
  }

  protected function isFalsy(
    mixed $value,
    string $message = "Should be falsy"
  ): void {
    if (!!$value !== false) {
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
    array_push($this->errors, "▶️ Line $lineNumber: $message");
  }

  public function __toString(): string
  {
    return $this::class;
  }
}
