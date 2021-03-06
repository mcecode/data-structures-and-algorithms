<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\SinglyLinkedListNode;
use Tests\Base\TestCase;

class SinglyLinkedListNodeTest extends TestCase
{
  protected function testGetData(): void
  {
    $this->isIdentical((new SinglyLinkedListNode("data"))->getData(), "data");
  }

  protected function testNext(): void
  {
    $tail = new SinglyLinkedListNode("tail");
    $head = new SinglyLinkedListNode("head", $tail);

    $this->isIdentical($tail->next(), null);
    $this->isIdentical($head->next(), $tail);
    $this->isIdentical($head->next(null), $tail);
    $this->isIdentical($head->next(), $tail);

    $newTail = new SinglyLinkedListNode("new tail");

    $this->isIdentical($head->next($newTail), $newTail);
    $this->isIdentical($head->next(), $newTail);
  }

  protected function testResetNext(): void
  {
    $tail = new SinglyLinkedListNode("tail");
    $head = new SinglyLinkedListNode("head", $tail);
    $head->resetNext();

    $this->isIdentical($head->next(), null);
  }
}
