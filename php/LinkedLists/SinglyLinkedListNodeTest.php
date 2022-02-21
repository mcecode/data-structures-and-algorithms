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

    $this->isIdentical($head->getData(), "head");
    $this->isIdentical($tail->getData(), "tail");

    $this->isIdentical($head->next(), $tail);
    $this->isIdentical($tail->next(), null);

    $newTail = new SinglyLinkedListNode("new tail");

    $this->isIdentical($head->next($newTail), $newTail);
    $this->isIdentical($head->next(), $newTail);
  }
}
