<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\DoublyLinkedListNode;
use Tests\Base\TestCase;

class DoublyLinkedListNodeTest extends TestCase
{
  protected function testGetData(): void
  {
    $this->isIdentical((new DoublyLinkedListNode("data"))->getData(), "data");
  }

  protected function testNext(): void
  {
    $tail = new DoublyLinkedListNode("tail");
    $head = new DoublyLinkedListNode("head", $tail);

    $this->isIdentical($head->next(), $tail);
    $this->isIdentical($tail->next(), null);

    $newTail = new DoublyLinkedListNode("new tail");

    $this->isIdentical($head->next($newTail), $newTail);
    $this->isIdentical($head->next(), $newTail);
  }

  protected function testPrevious(): void
  {
    $head = new DoublyLinkedListNode("head");
    $tail = new DoublyLinkedListNode("tail", previous: $head);

    $this->isIdentical($head->previous(), null);
    $this->isIdentical($tail->previous(), $head);

    $newHead = new DoublyLinkedListNode("new head");

    $this->isIdentical($tail->previous($newHead), $newHead);
    $this->isIdentical($tail->previous(), $newHead);
  }
}
