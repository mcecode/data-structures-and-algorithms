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

    $this->isEqual($head->getData(), "head");
    $this->isEqual($tail->getData(), "tail");

    $this->isEqual($head->next(), $tail);
    $this->isEqual($tail->next(), null);

    $newTail = new SinglyLinkedListNode("new tail");

    $this->isEqual($head->next($newTail), $newTail);
    $this->isEqual($head->next(), $newTail);
  }
}
