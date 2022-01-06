<?php

declare(strict_types=1);

namespace LinkedLists;

use Abstracts\Test;

class SinglyLinkedListNodeTest extends Test
{
  protected function run(): void
  {
    $tail = new SinglyLinkedListNode("tail");
    $head = new SinglyLinkedListNode("head", $tail);

    $this->isTruthy($head->getData() === "head");
    $this->isTruthy($tail->getData() === "tail");

    $this->isTruthy($head->next() === $tail);
    $this->isTruthy($tail->next() === null);

    $newTail = new SinglyLinkedListNode("new tail");

    $this->isTruthy($head->next($newTail) === $newTail);
    $this->isTruthy($head->next() === $newTail);
  }
}
