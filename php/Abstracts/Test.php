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

  private static bool $has_been_invoked = false;
  private array $errors = [];

  public function __construct()
  {
    if (!self::$has_been_invoked) {
      echo "\n";
      self::$has_been_invoked = true;
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

  /**
   * Asserts that `$value` is truthy.
   */
  protected function isTruthy(
    mixed $value,
    string $message = "Should be truthy"
  ): void {
    if (!!$value !== true) {
      $this->setError($message);
    }
  }

  /**
   * Asserts that `$value` is falsy.
   */
  protected function isFalsy(
    mixed $value,
    string $message = "Should be falsy"
  ): void {
    if (!!$value !== false) {
      $this->setError($message);
    }
  }

  /**
   * @param \Closure $throwing_function A function that should throw a
   * throwable.
   * @param string $instance_of The name of the class that the thrown throwable
   * must be an instance of.
   */
  protected function throws(
    \Closure $throwing_function,
    string $message = "Should throw throwable",
    string $instance_of = null
  ): void {
    try {
      $throwing_function();
    } catch (\Throwable $throwable) {
      if ($instance_of !== null && !($throwable instanceof $instance_of)) {
        $this->setError($message);
      }

      return;
    }

    $this->setError($message);
  }

  private function setError(string $message): void
  {
    $line_number = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]["line"];
    array_push($this->errors, "▶️ Line $line_number: $message");
  }

  public function __toString(): string
  {
    return $this::class;
  }
}
