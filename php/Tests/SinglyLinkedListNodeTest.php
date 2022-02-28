<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\SinglyLinkedListNode;
use Tests\Base\TestCase;

class SinglyLinkedListNodeTest extends TestCase
{
  protected function test(): void
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
