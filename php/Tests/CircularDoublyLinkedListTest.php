<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\CircularDoublyLinkedList;
use Tests\Attributes\Todo;
use Tests\Base\LinkedListTestCase;

class CircularDoublyLinkedListTest extends LinkedListTestCase
{
  protected CircularDoublyLinkedList $linkedList;

  protected function runBeforeEach(): void
  {
    $this->linkedList = new CircularDoublyLinkedList();
  }

  protected function testEmptyList(): void
  {
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);
  }

  protected function testInsertHead(): void
  {
    $a = $this->linkedList->insertHead("a");

    $this->isIdentical($a->getData(), "a");
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);

    $b = $this->linkedList->insertHead("b");

    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);

    $c = $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->getHead(), $c);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $c);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical($this->turnLinkedListToArray(), ["c", "b", "a"]);
  }

  protected function testInsertTail(): void
  {
    $a = $this->linkedList->insertTail("a");

    $this->isIdentical($a->getData(), "a");
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);

    $b = $this->linkedList->insertTail("b");

    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);

    $c = $this->linkedList->insertTail("c");

    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $c);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $c);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical($this->turnLinkedListToArray(), ["a", "b", "c"]);
  }

  protected function testInsertBefore(): void
  {
    $this->isIdentical($this->linkedList->insertBefore(null, "a"), null);
    $this->isIdentical($this->linkedList->insertBefore("a", "b"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertBefore("a", "b");
    $c = $this->linkedList->insertBefore("a", "c");
    $this->linkedList->insertBefore("c", "d");
    $e = $this->linkedList->insertBefore("b", "e");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->insertBefore("z", "y"), null);
    $this->isIdentical($this->linkedList->getHead(), $e);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $e);
    $this->isIdentical($this->linkedList->getTail()->previous(), $c);
    $this->isIdentical(
      $this->turnLinkedListToArray(),
      ["e", "b", "d", "c", "a"]
    );
  }

  protected function testInsertBeforeTail(): void
  {
    $this->isIdentical($this->linkedList->insertBeforeTail("a"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertBeforeTail("b");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);

    $c = $this->linkedList->insertBeforeTail("c");
    $d = $this->linkedList->insertBeforeTail("d");

    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $c);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);
    $this->isIdentical($this->turnLinkedListToArray(), ["b", "c", "d", "a"]);
  }

  #[Todo]
  protected function testInsertBeforeAt(): void
  {
  }

  #[Todo]
  protected function testInsertAfter(): void
  {
  }

  #[Todo]
  protected function testInsertAfterHead(): void
  {
  }

  #[Todo]
  protected function testInsertAfterAt(): void
  {
  }

  #[Todo]
  protected function testInsertBetween(): void
  {
  }

  #[Todo]
  protected function testFind(): void
  {
  }

  #[Todo]
  protected function testFindAt(): void
  {
  }

  #[Todo]
  protected function testReplace(): void
  {
  }

  #[Todo]
  protected function testReplaceAt(): void
  {
  }

  #[Todo]
  protected function testDeleteHead(): void
  {
  }

  #[Todo]
  protected function testDeleteTail(): void
  {
  }

  #[Todo]
  protected function testDelete(): void
  {
  }

  #[Todo]
  protected function testDeleteAt(): void
  {
  }

  protected function testCount(): void
  {
    $this->isIdentical($this->linkedList->count(), 0);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->count(), 3);
  }

  #[Todo]
  protected function testReverse(): void
  {
  }
}
