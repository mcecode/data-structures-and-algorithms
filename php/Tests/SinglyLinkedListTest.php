<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\SinglyLinkedList;
use Tests\Base\LinkedListTestCase;

class SinglyLinkedListTest extends LinkedListTestCase
{
  private SinglyLinkedList $linkedList;

  protected function runBeforeEach(): void
  {
    $this->linkedList = new SinglyLinkedList();
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
    $this->isIdentical($this->linkedList->getHead()->next(), null);
    $this->isIdentical($this->linkedList->getTail()->next(), null);

    $b = $this->linkedList->insertHead("b");

    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), null);

    $c = $this->linkedList->insertHead("c");

    $this->isIdentical($a->getData(), "a");
    $this->isIdentical($this->linkedList->getHead(), $c);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["c", "b", "a"]
    );
  }

  protected function testInsertTail(): void
  {
    $a = $this->linkedList->insertTail("a");

    $this->isIdentical($a->getData(), "a");
    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getHead()->next(), null);
    $this->isIdentical($this->linkedList->getTail()->next(), null);

    $b = $this->linkedList->insertTail("b");

    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), null);

    $c = $this->linkedList->insertTail("c");

    $this->isIdentical($this->linkedList->getHead(), $a);
    $this->isIdentical($this->linkedList->getTail(), $c);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getTail()->next(), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["a", "b", "c"]
    );
  }

  protected function testInsertBefore(): void
  {
    $this->isIdentical($this->linkedList->insertBefore(null, "a"), null);
    $this->isIdentical($this->linkedList->insertBefore("a", "b"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $a = $this->linkedList->insertHead("a");
    $b = $this->linkedList->insertBefore("a", "b");
    $this->linkedList->insertBefore("a", "c");
    $this->linkedList->insertBefore("c", "d");
    $e = $this->linkedList->insertBefore("b", "e");

    $this->isIdentical($b->getData(), "b");
    $this->isIdentical($this->linkedList->insertBefore("z", "y"), null);
    $this->isIdentical($this->linkedList->getHead(), $e);
    $this->isIdentical($this->linkedList->getHead()->next(), $b);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
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
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), null);

    $c = $this->linkedList->insertBeforeTail("c");
    $this->linkedList->insertBeforeTail("d");

    $this->isIdentical($this->linkedList->getHead(), $b);
    $this->isIdentical($this->linkedList->getHead()->next(), $c);
    $this->isIdentical($this->linkedList->getTail(), $a);
    $this->isIdentical($this->linkedList->getTail()->next(), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
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

    $this->linkedList->insertHead("a");

    $this->isIdentical(
      $this->linkedList->insertBeforeAt(0, "b"),
      $this->linkedList->getHead()
    );

    $this->linkedList->insertBeforeAt(1, "c");
    $this->linkedList->insertBeforeAt(-1, "d");
    $this->linkedList->insertBeforeAt(1, "e");

    $this->isIdentical($this->linkedList->insertBeforeAt(5, "e"), null);
    $this->isIdentical($this->linkedList->insertBeforeAt(-6, "e"), null);
    $this->isIdentical($this->linkedList->getHead()->getData(), "b");
    $this->isIdentical($this->linkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["b", "e", "c", "d", "a"]
    );
  }

  protected function testInsertAfter(): void
  {
    $this->isIdentical($this->linkedList->insertAfter("a", "b"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertAfter("a", "b");
    $this->linkedList->insertAfter("a", "c");
    $this->linkedList->insertAfter("c", "d");

    $this->isIdentical($this->linkedList->insertAfter("z", "y"), null);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["a", "c", "d", "b"]
    );
  }

  protected function testInsertAfterHead(): void
  {
    $this->isIdentical($this->linkedList->insertAfterHead("a"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertAfterHead("b");

    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");

    $this->linkedList->insertAfterHead("c");
    $this->linkedList->insertAfterHead("d");

    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
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

    $this->linkedList->insertHead("a");

    $this->isIdentical(
      $this->linkedList->insertAfterAt(0, "b"),
      $this->linkedList->getTail()
    );

    $this->linkedList->insertAfterAt(1, "c");
    $this->linkedList->insertAfterAt(-1, "d");
    $this->linkedList->insertAfterAt(1, "e");

    $this->isIdentical($this->linkedList->insertAfterAt(5, "e"), null);
    $this->isIdentical($this->linkedList->insertAfterAt(-6, "e"), null);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "d");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["a", "b", "e", "c", "d"]
    );
  }

  protected function testInsertBetween(): void
  {
    $this->isIdentical($this->linkedList->insertBetween("a", "b", "c"), null);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertTail("a");
    $this->linkedList->insertTail("b");
    $this->linkedList->insertBetween("a", "b", "c");
    $this->linkedList->insertBetween("c", "b", "d");

    $this->isIdentical($this->linkedList->insertBetween("c", "b", "d"), null);
    $this->isIdentical($this->linkedList->insertBetween("z", "y", "x"), null);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["a", "c", "d", "b"]
    );
  }

  protected function testFind(): void
  {
    $this->isIdentical($this->linkedList->find("a"), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->find("b")->getData(), "b");
    $this->isIdentical(
      $this->linkedList->find("c"),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->find("a"),
      $this->linkedList->getTail()
    );
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["c", "b", "a"]
    );
  }

  protected function testFindAt(): void
  {
    $this->isIdentical($this->linkedList->findAt(0), null);
    $this->isIdentical($this->linkedList->findAt(1), null);
    $this->isIdentical($this->linkedList->findAt(-1), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->findAt(1)->getData(), "b");
    $this->isIdentical($this->linkedList->findAt(-2)->getData(), "b");
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
    $this->isIdentical($this->linkedList->findAt(5), null);
    $this->isIdentical($this->linkedList->findAt(-6), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["c", "b", "a"]
    );
  }

  protected function testReplace(): void
  {
    $this->isIdentical($this->linkedList->replace("a", "d"), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->replace("b", "e")->getData(), "e");
    $this->isIdentical(
      $this->linkedList->replace("c", "f"),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->replace("a", "d"),
      $this->linkedList->getTail()
    );
    $this->isIdentical($this->linkedList->getHead()->getData(), "f");
    $this->isIdentical($this->linkedList->getTail()->getData(), "d");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["f", "e", "d"]
    );
  }

  protected function testReplaceAt(): void
  {
    $this->isIdentical($this->linkedList->replaceAt(0, "a"), null);
    $this->isIdentical($this->linkedList->replaceAt(1, "a"), null);
    $this->isIdentical($this->linkedList->replaceAt(-1, "a"), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $this->isIdentical($this->linkedList->replaceAt(1, "d")->getData(), "d");
    $this->isIdentical(
      $this->linkedList->replaceAt(0, "e"),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->replaceAt(2, "f"),
      $this->linkedList->getTail()
    );
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["e", "d", "f"]
    );
    $this->isIdentical($this->linkedList->replaceAt(-2, "g")->getData(), "g");
    $this->isIdentical(
      $this->linkedList->replaceAt(-3, "h"),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->replaceAt(-1, "i"),
      $this->linkedList->getTail()
    );
    $this->isIdentical($this->linkedList->replaceAt(5, "i"), null);
    $this->isIdentical($this->linkedList->replaceAt(-6, "i"), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["h", "g", "i"]
    );
  }

  protected function testDeleteHead(): void
  {
    $this->isIdentical($this->linkedList->deleteHead(), null);

    $this->linkedList->insertHead("a");

    $previousHead = $this->linkedList->getHead();
    $this->isIdentical($this->linkedList->deleteHead(), $previousHead);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");

    $previousHead = $this->linkedList->getHead();
    $this->isIdentical($this->linkedList->deleteHead(), $previousHead);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["a"]);

    $this->linkedList->insertHead("c");
    $this->linkedList->insertHead("d");

    $previousHead = $this->linkedList->getHead();
    $this->isIdentical($this->linkedList->deleteHead(), $previousHead);
    $this->isIdentical($this->linkedList->getHead()->getData(), "c");
    $this->isIdentical($this->linkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["c", "a"]
    );
  }

  protected function testDeleteTail(): void
  {
    $this->isIdentical($this->linkedList->deleteTail(), null);

    $this->linkedList->insertTail("a");

    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->deleteTail(), $previousTail);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertTail("a");
    $this->linkedList->insertTail("b");

    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->deleteTail(), $previousTail);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["a"]);

    $this->linkedList->insertTail("c");
    $this->linkedList->insertTail("d");

    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->deleteTail(), $previousTail);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "c");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["a", "c"]
    );
  }

  protected function testDelete(): void
  {
    $this->isIdentical($this->linkedList->delete("a"), null);

    $this->linkedList->insertHead("a");

    $previousHead = $this->linkedList->getHead();
    $previousTail = $this->linkedList->getTail();
    $deletedNode = $this->linkedList->delete("a");
    $this->isIdentical($deletedNode, $previousHead);
    $this->isIdentical($deletedNode, $previousTail);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");

    $previousHead = $this->linkedList->getHead();
    $this->isIdentical($this->linkedList->delete("b"), $previousHead);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["a"]);

    $this->linkedList->insertHead("b");

    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->delete("a"), $previousTail);
    $this->isIdentical($this->linkedList->getHead()->getData(), "b");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["b"]);

    $this->linkedList->insertHead("c");
    $this->linkedList->insertHead("d");
    $this->linkedList->delete("c");

    $this->isIdentical($this->linkedList->getHead()->getData(), "d");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["d", "b"]
    );
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
    $this->isIdentical($deletedNode, $previousHead);
    $this->isIdentical($deletedNode, $previousTail);
    $this->isIdentical($this->linkedList->getHead(), null);
    $this->isIdentical($this->linkedList->getTail(), null);

    $this->linkedList->insertHead("a");
    $this->linkedList->insertHead("b");

    $previousHead = $this->linkedList->getHead();
    $this->isIdentical($this->linkedList->deleteAt(0), $previousHead);
    $this->isIdentical($this->linkedList->getHead()->getData(), "a");
    $this->isIdentical($this->linkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["a"]);

    $this->linkedList->insertHead("b");

    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->deleteAt(-1), $previousTail);
    $this->isIdentical($this->linkedList->getHead()->getData(), "b");
    $this->isIdentical($this->linkedList->getTail()->getData(), "b");
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["b"]);

    $this->linkedList->insertHead("c");
    $this->linkedList->insertHead("d");
    $this->linkedList->insertHead("e");
    $this->linkedList->insertHead("f");
    $this->linkedList->insertHead("g");

    $previousHead = $this->linkedList->getHead();
    $this->isIdentical($this->linkedList->deleteAt(-6), $previousHead);
    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->deleteAt(4), $previousTail);
    $this->linkedList->deleteAt(1);
    $this->linkedList->deleteAt(-2);
    $this->isIdentical($this->linkedList->deleteAt(5), null);
    $this->isIdentical($this->linkedList->deleteAt(-6), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["f", "c"]
    );
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

    $this->linkedList->insertHead("a");

    $this->isIdentical(
      $this->linkedList->reverse(),
      $this->linkedList->getHead()
    );
    $this->isIdentical(
      $this->linkedList->reverse(),
      $this->linkedList->getTail()
    );
    $this->isIdentical($this->turnLinkedListToArray($this->linkedList), ["a"]);

    $this->linkedList->insertHead("b");
    $this->linkedList->insertHead("c");

    $previousTail = $this->linkedList->getTail();
    $this->isIdentical($this->linkedList->reverse(), $previousTail);
    $this->isIdentical(
      $this->turnLinkedListToArray($this->linkedList),
      ["a", "b", "c"]
    );
  }
}
