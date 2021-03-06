<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\CircularDoublyLinkedList;
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
    $this->isIdentical($this->turnLinkedListToArray(true), ["c", "b", "a"]);
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
    $this->isIdentical($this->turnLinkedListToArray(true), ["a", "b", "c"]);
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
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
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
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
      ["b", "c", "d", "a"]
    );
  }

  protected function testInsertBeforeAt(): void
  {
    $this->isIdentical($this->linkedList->insertBeforeAt(0, "a"), null);
    $this->isIdentical($this->linkedList->insertBeforeAt(1, "a"), null);
    $this->isIdentical($this->linkedList->insertBeforeAt(-1, "a"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertBeforeAt(0, "b");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);

    $this->linkedList->insertBeforeAt(1, "c");
    $d = $this->linkedList->insertBeforeAt(-1, "d");
    $this->linkedList->insertBeforeAt(2, "e");
    $this->linkedList->insertBeforeAt(-2, "f");
    $g = $this->linkedList->insertBeforeAt(0, "g");

    $this->isIdentical($this->linkedList->insertBeforeAt(7, "g"), null);
    $this->isIdentical($this->linkedList->insertBeforeAt(-8, "g"), null);
    $this->isIdentical($this->linkedList->getHead(), $g);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $g);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);
    $this->isIdentical(
      $this->turnLinkedListToArray(),
      ["g", "b", "c", "e", "f", "d", "a"]
    );
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
      ["g", "b", "c", "e", "f", "d", "a"]
    );
  }

  protected function testInsertAfter(): void
  {
    $this->isIdentical($this->linkedList->insertAfter(null, "a"), null);
    $this->isIdentical($this->linkedList->insertAfter("a", "b"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertAfter("a", "b");
    $c = $this->linkedList->insertAfter("a", "c");
    $this->linkedList->insertAfter("c", "d");
    $e = $this->linkedList->insertAfter("b", "e");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->insertAfter("z", "y"), null);
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $c);
    $this->isIdentical($this->linkedList->getHead()->previous(), $e);
    $this->isIdentical($this->linkedList->getTail(), $e);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical(
      $this->turnLinkedListToArray(),
      ["a", "c", "d", "b", "e"]
    );
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
      ["a", "c", "d", "b", "e"]
    );
  }

  protected function testInsertAfterHead(): void
  {
    $this->isIdentical($this->linkedList->insertAfterHead("a"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertAfterHead("b");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);

    $c = $this->linkedList->insertAfterHead("c");
    $d = $this->linkedList->insertAfterHead("d");

    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $d);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $c);
    $this->isIdentical($this->turnLinkedListToArray(), ["a", "d", "c", "b"]);
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
      ["a", "d", "c", "b"]
    );
  }

  protected function testInsertAfterAt(): void
  {
    $this->isIdentical($this->linkedList->insertAfterAt(0, "a"), null);
    $this->isIdentical($this->linkedList->insertAfterAt(1, "a"), null);
    $this->isIdentical($this->linkedList->insertAfterAt(-1, "a"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertAfterAt(0, "b");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);

    $this->linkedList->insertAfterAt(1, "c");
    $d = $this->linkedList->insertAfterAt(-1, "d");
    $this->linkedList->insertAfterAt(2, "e");
    $f = $this->linkedList->insertAfterAt(-2, "f");
    $g = $this->linkedList->insertAfterAt(0, "g");

    $this->isIdentical($this->linkedList->insertAfterAt(7, "g"), null);
    $this->isIdentical($this->linkedList->insertAfterAt(-8, "g"), null);
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $g);
    $this->isIdentical($this->linkedList->getHead()->previous(), $d);
    $this->isIdentical($this->linkedList->getTail(), $d);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $f);
    $this->isIdentical(
      $this->turnLinkedListToArray(),
      ["a", "g", "b", "c", "e", "f", "d"]
    );
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
      ["a", "g", "b", "c", "e", "f", "d"]
    );
  }

  protected function testInsertBetween(): void
  {
    $this->isIdentical(
      $this->linkedList->insertBetween(null, null, "a"),
      null
    );
    $this->isIdentical($this->linkedList->insertBetween("a", "b", "c"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertHead("b");
    $this->linkedList->insertBetween("b", "a", "c");
    $d = $this->linkedList->insertBetween("c", "a", "d");
    $e = $this->linkedList->insertBetween("b", "c", "e");
    $this->linkedList->insertBetween("e", "c", "f");

    $this->isIdentical($d->getData(), "d");
    $this->isIdentical($this->linkedList->insertBetween("e", "c", "f"), null);
    $this->isIdentical($this->linkedList->insertBetween("f", "e", "f"), null);
    $this->isIdentical($this->linkedList->insertBetween("a", "b", "f"), null);
    $this->isIdentical($this->linkedList->insertBetween("z", "y", "x"), null);
    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $e);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);
    $this->isIdentical(
      $this->turnLinkedListToArray(),
      ["b", "e", "f", "c", "d", "a"]
    );
    $this->isIdentical(
      $this->turnLinkedListToArray(true),
      ["b", "e", "f", "c", "d", "a"]
    );
  }

  protected function testFind(): void
  {
    $this->isIdentical($this->linkedList->find(null), null);
    $this->isIdentical($this->linkedList->find("a"), null);

    $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->find("b"), $b);
    $this->isIdentical(
      $this->linkedList->find("c"),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->find("a"),
      $this->linkedList->getTail()
    );
    $this->isIdentical($this->linkedList->find("z"), null);
  }

  protected function testFindAt(): void
  {
    $this->isIdentical($this->linkedList->findAt(0), null);
    $this->isIdentical($this->linkedList->findAt(1), null);
    $this->isIdentical($this->linkedList->findAt(-1), null);

    $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->findAt(1), $b);
    $this->isIdentical($this->linkedList->findAt(-2), $b);
    $this->isIdentical(
      $this->linkedList->findAt(0),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->findAt(-3),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->findAt(2),
      $this->linkedList->getTail()
    );
    $this->isIdentical(
      $this->linkedList->findAt(-1),
      $this->linkedList->getTail()
    );
    $this->isIdentical($this->linkedList->findAt(3), null);
    $this->isIdentical($this->linkedList->findAt(-4), null);
  }

  protected function testReplace(): void
  {
    $this->isIdentical($this->linkedList->replace(null, "a"), null);
    $this->isIdentical($this->linkedList->replace("a", "d"), null);

    $this->linkedList->insertHead("a");
    $d = $this->linkedList->replace("a", "d");

    $this->isIdentical($d->getData(), "d");
    $this->isIdentical($this->linkedList->getHead(), $d);
    $this->isIdentical($this->linkedList->getHead()->next(), $d);
    $this->isIdentical($this->linkedList->getHead()->previous(), $d);
    $this->isIdentical($this->linkedList->getTail(), $d);
    $this->isIdentical($this->linkedList->getTail()->next(), $d);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);

    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");
    $e = $this->linkedList->replace("b", "e");
    $f = $this->linkedList->replace("c", "f");

    $this->isIdentical($this->linkedList->replace("a", "d"), null);
    $this->isIdentical($this->linkedList->replace("z", "y"), null);
    $this->isIdentical($this->linkedList->getHead(), $f);
    $this->isIdentical($this->linkedList->getHead()->next(), $e);
    $this->isIdentical($this->linkedList->getHead()->previous(), $d);
    $this->isIdentical($this->linkedList->getTail(), $d);
    $this->isIdentical($this->linkedList->getTail()->next(), $f);
    $this->isIdentical($this->linkedList->getTail()->previous(), $e);
    $this->isIdentical($this->turnLinkedListToArray(), ["f", "e", "d"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["f", "e", "d"]);
  }

  protected function testReplaceAt(): void
  {
    $this->isIdentical($this->linkedList->replaceAt(0, "a"), null);
    $this->isIdentical($this->linkedList->replaceAt(1, "a"), null);
    $this->isIdentical($this->linkedList->replaceAt(-1, "a"), null);

    $this->linkedList->insertHead("a");
    $d = $this->linkedList->replaceAt(0, "d");

    $this->isIdentical($d->getData(), "d");
    $this->isIdentical($this->linkedList->getHead(), $d);
    $this->isIdentical($this->linkedList->getHead()->next(), $d);
    $this->isIdentical($this->linkedList->getHead()->previous(), $d);
    $this->isIdentical($this->linkedList->getTail(), $d);
    $this->isIdentical($this->linkedList->getTail()->next(), $d);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);

    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");
    $e = $this->linkedList->replaceAt(0, "e");
    $f = $this->linkedList->replaceAt(1, "f");
    $g = $this->linkedList->replaceAt(2, "g");

    $this->isIdentical($this->linkedList->replaceAt(3, "k"), null);
    $this->isIdentical($this->linkedList->getHead(), $e);
    $this->isIdentical($this->linkedList->getHead()->next(), $f);
    $this->isIdentical($this->linkedList->getHead()->previous(), $g);
    $this->isIdentical($this->linkedList->getTail(), $g);
    $this->isIdentical($this->linkedList->getTail()->next(), $e);
    $this->isIdentical($this->linkedList->getTail()->previous(), $f);
    $this->isIdentical($this->turnLinkedListToArray(), ["e", "f", "g"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["e", "f", "g"]);

    $h = $this->linkedList->replaceAt(-1, "h");
    $i = $this->linkedList->replaceAt(-2, "i");
    $j = $this->linkedList->replaceAt(-3, "j");

    $this->isIdentical($this->linkedList->replaceAt(-4, "k"), null);
    $this->isIdentical($this->linkedList->getHead(), $j);
    $this->isIdentical($this->linkedList->getHead()->next(), $i);
    $this->isIdentical($this->linkedList->getHead()->previous(), $h);
    $this->isIdentical($this->linkedList->getTail(), $h);
    $this->isIdentical($this->linkedList->getTail()->next(), $j);
    $this->isIdentical($this->linkedList->getTail()->previous(), $i);
    $this->isIdentical($this->turnLinkedListToArray(), ["j", "i", "h"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["j", "i", "h"]);
  }

  protected function testDeleteHead(): void
  {
    $this->isIdentical($this->linkedList->deleteHead(), null);

    $this->linkedList->insertHead("a");
    $previousHead = $this->linkedList->getHead();
    $previousTail = $this->linkedList->getTail();
    $deletedHead = $this->linkedList->deleteHead();

    $this->isIdentical($deletedHead->getData(), "a");
    $this->isIdentical($previousHead, $deletedHead);
    $this->isIdentical($previousTail, $deletedHead);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $previousHead = $this->linkedList->getHead();

    $this->isIdentical($this->linkedList->deleteHead(), $previousHead);
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);
    $this->isIdentical($this->turnLinkedListToArray(), ["a"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["a"]);

    $c = $this->linkedList->insertHead("c");
    $this->linkedList->insertHead("d");
    $previousHead = $this->linkedList->getHead();

    $this->isIdentical($this->linkedList->deleteHead(), $previousHead);
    $this->isIdentical($this->linkedList->getHead(), $c);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $c);
    $this->isIdentical($this->linkedList->getTail()->previous(), $c);
    $this->isIdentical($this->turnLinkedListToArray(), ["c", "a"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["c", "a"]);
  }

  protected function testDeleteTail(): void
  {
    $this->isIdentical($this->linkedList->deleteTail(), null);

    $this->linkedList->insertHead("a");
    $previousHead = $this->linkedList->getHead();
    $previousTail = $this->linkedList->getTail();
    $deletedTail = $this->linkedList->deleteTail();

    $this->isIdentical($deletedTail->getData(), "a");
    $this->isIdentical($previousHead, $deletedTail);
    $this->isIdentical($previousTail, $deletedTail);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertHead("b");
    $previousTail = $this->linkedList->getTail();

    $this->isIdentical($this->linkedList->deleteTail(), $previousTail);
    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical($this->turnLinkedListToArray(), ["b"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["b"]);

    $c = $this->linkedList->insertHead("c");
    $d = $this->linkedList->insertHead("d");
    $previousTail = $this->linkedList->getTail();

    $this->isIdentical($this->linkedList->deleteTail(), $previousTail);
    $this->isIdentical($this->linkedList->getHead(), $d);
    $this->isIdentical($this->linkedList->getHead()->next(), $c);
    $this->isIdentical($this->linkedList->getHead()->previous(), $c);
    $this->isIdentical($this->linkedList->getTail(), $c);
    $this->isIdentical($this->linkedList->getTail()->next(), $d);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);
    $this->isIdentical($this->turnLinkedListToArray(), ["d", "c"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["d", "c"]);
  }

  protected function testDelete(): void
  {
    $this->isIdentical($this->linkedList->delete(null), null);
    $this->isIdentical($this->linkedList->delete("a"), null);

    $this->linkedList->insertHead("a");
    $previousHead = $this->linkedList->getHead();
    $previousTail = $this->linkedList->getTail();
    $deletedNode = $this->linkedList->delete("a");

    $this->isIdentical($deletedNode->getData(), "a");
    $this->isIdentical($deletedNode, $previousHead);
    $this->isIdentical($deletedNode, $previousTail);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $previousHead = $this->linkedList->getHead();

    $this->isIdentical($this->linkedList->delete("b"), $previousHead);
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);
    $this->isIdentical($this->turnLinkedListToArray(), ["a"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["a"]);

    $b = $this->linkedList->insertHead("b");
    $previousTail = $this->linkedList->getTail();

    $this->isIdentical($this->linkedList->delete("a"), $previousTail);
    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical($this->turnLinkedListToArray(), ["b"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["b"]);

    $this->linkedList->insertHead("c");
    $d = $this->linkedList->insertHead("d");
    $this->linkedList->delete("c");

    $this->isIdentical($this->linkedList->delete("z"), null);
    $this->isIdentical($this->linkedList->getHead(), $d);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $d);
    $this->isIdentical($this->linkedList->getTail()->previous(), $d);
    $this->isIdentical($this->turnLinkedListToArray(), ["d", "b"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["d", "b"]);
  }

  protected function testDeleteAt(): void
  {
    $this->isIdentical($this->linkedList->deleteAt(0), null);
    $this->isIdentical($this->linkedList->deleteAt(1), null);
    $this->isIdentical($this->linkedList->deleteAt(-1), null);

    $this->linkedList->insertHead("a");
    $previousHead = $this->linkedList->getHead();
    $previousTail = $this->linkedList->getTail();
    $deletedNode = $this->linkedList->deleteAt(0);

    $this->isIdentical($deletedNode->getData(), "a");
    $this->isIdentical($deletedNode, $previousHead);
    $this->isIdentical($deletedNode, $previousTail);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $previousHead = $this->linkedList->getHead();

    $this->isIdentical($this->linkedList->deleteAt(0), $previousHead);
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getHead()->previous(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $a);
    $this->isIdentical($this->turnLinkedListToArray(), ["a"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["a"]);

    $b = $this->linkedList->insertHead("b");
    $previousTail = $this->linkedList->getTail();

    $this->isIdentical($this->linkedList->deleteAt(-1), $previousTail);
    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $b);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical($this->turnLinkedListToArray(), ["b"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["b"]);

    $c = $this->linkedList->insertHead("c");
    $d = $this->linkedList->insertHead("d");
    $e = $this->linkedList->insertHead("e");
    $f = $this->linkedList->insertHead("f");
    $this->linkedList->insertHead("g");
    $previousHead = $this->linkedList->getHead();
    $previousTail = $this->linkedList->getTail();

    $this->isIdentical($this->linkedList->deleteAt(-6), $previousHead);
    $this->isIdentical($this->linkedList->deleteAt(4), $previousTail);
    $this->isIdentical($this->linkedList->deleteAt(1), $e);
    $this->isIdentical($this->linkedList->deleteAt(-2), $d);
    $this->isIdentical($this->linkedList->deleteAt(2), null);
    $this->isIdentical($this->linkedList->deleteAt(-3), null);
    $this->isIdentical($this->linkedList->getHead(), $f);
    $this->isIdentical($this->linkedList->getHead()->next(), $c);
    $this->isIdentical($this->linkedList->getHead()->previous(), $c);
    $this->isIdentical($this->linkedList->getTail(), $c);
    $this->isIdentical($this->linkedList->getTail()->next(), $f);
    $this->isIdentical($this->linkedList->getTail()->previous(), $f);
    $this->isIdentical($this->turnLinkedListToArray(), ["f", "c"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["f", "c"]);
  }

  protected function testCount(): void
  {
    $this->isIdentical($this->linkedList->count(), 0);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->count(), 3);
  }

  protected function testReverse(): void
  {
    $this->isIdentical($this->linkedList->reverse(), null);

    $a = $this->linkedList->insertHead("a");
    $newHead = $this->linkedList->reverse();

    $this->isIdentical($newHead->getData(), "a");
    $this->isIdentical($this->linkedList->getHead(), $newHead);
    $this->isIdentical($this->linkedList->getHead()->next(), $newHead);
    $this->isIdentical($this->linkedList->getHead()->previous(), $newHead);
    $this->isIdentical($this->linkedList->getTail(), $newHead);
    $this->isIdentical($this->linkedList->getTail()->next(), $newHead);
    $this->isIdentical($this->linkedList->getTail()->previous(), $newHead);
    $this->isIdentical($this->turnLinkedListToArray(), ["a"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["a"]);

    $b = $this->linkedList->insertHead("b");
    $c = $this->linkedList->insertHead("c");
    $previousTail = $this->linkedList->getTail();

    $this->isIdentical($this->linkedList->reverse(), $previousTail);
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getHead()->previous(), $c);
    $this->isIdentical($this->linkedList->getTail(), $c);
    $this->isIdentical($this->linkedList->getTail()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->previous(), $b);
    $this->isIdentical($this->turnLinkedListToArray(), ["a", "b", "c"]);
    $this->isIdentical($this->turnLinkedListToArray(true), ["a", "b", "c"]);
  }
}
