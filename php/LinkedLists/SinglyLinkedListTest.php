<?php

declare(strict_types=1);

namespace LinkedLists;

use Abstracts\LinkedListTest;

class SinglyLinkedListTest extends LinkedListTest
{
  protected function run(): void
  {
    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);
    $this->isEqual($singlyLinkedList->count(), 0);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "c");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual($singlyLinkedList->count(), 3);
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertTail("c");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "c");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBefore("a", "b"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $singlyLinkedList->insertBefore("a", "c");
    $singlyLinkedList->insertBefore("c", "d");

    $this->isEqual($singlyLinkedList->insertBefore("z", "y"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "d", "c", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBeforeTail("a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBeforeTail("b");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");

    $singlyLinkedList->insertBeforeTail("c");
    $singlyLinkedList->insertBeforeTail("d");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBeforeAt(0, "a"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(1, "a"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(-1, "a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");

    $this->isEqual(
      $singlyLinkedList->insertBeforeAt(0, "b"),
      $singlyLinkedList->getHead()
    );

    $singlyLinkedList->insertBeforeAt(1, "c");
    $singlyLinkedList->insertBeforeAt(-1, "d");
    $singlyLinkedList->insertBeforeAt(1, "e");

    $this->isEqual($singlyLinkedList->insertBeforeAt(5, "e"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(-6, "e"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "e", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfter("a", "b"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfter("a", "b");
    $singlyLinkedList->insertAfter("a", "c");
    $singlyLinkedList->insertAfter("c", "d");

    $this->isEqual($singlyLinkedList->insertAfter("z", "y"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfterHead("a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfterHead("b");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");

    $singlyLinkedList->insertAfterHead("c");
    $singlyLinkedList->insertAfterHead("d");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "d", "c", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfterAt(0, "a"), null);
    $this->isEqual($singlyLinkedList->insertAfterAt(1, "a"), null);
    $this->isEqual($singlyLinkedList->insertAfterAt(-1, "a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");

    $this->isEqual(
      $singlyLinkedList->insertAfterAt(0, "b"),
      $singlyLinkedList->getTail()
    );

    $singlyLinkedList->insertAfterAt(1, "c");
    $singlyLinkedList->insertAfterAt(-1, "d");
    $singlyLinkedList->insertAfterAt(1, "e");

    $this->isEqual($singlyLinkedList->insertAfterAt(5, "e"), null);
    $this->isEqual($singlyLinkedList->insertAfterAt(-6, "e"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "d");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "e", "c", "d"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBetween("a", "b", "c"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertBetween("a", "b", "c");
    $singlyLinkedList->insertBetween("c", "b", "d");

    $this->isEqual($singlyLinkedList->insertBetween("c", "b", "d"), null);
    $this->isEqual($singlyLinkedList->insertBetween("z", "y", "x"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );
  }
}
