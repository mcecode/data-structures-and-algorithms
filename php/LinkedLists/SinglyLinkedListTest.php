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
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), []);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $singlyLinkedList->insertBefore("a", "c");
    $singlyLinkedList->insertBefore("c", "d");

    $this->isEqual($singlyLinkedList->insertBefore("z", "y"), null);
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "d", "c", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBeforeTail("a"), null);
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), []);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBeforeTail("b");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual($singlyLinkedList->count(), 2);

    $singlyLinkedList->insertBeforeTail("c");
    $singlyLinkedList->insertBeforeTail("d");

    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBeforeAt(0, "a"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(1, "a"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(-1, "a"), null);
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), []);

    $singlyLinkedList->insertHead("a");

    $this->isEqual(
      $singlyLinkedList->insertBeforeAt(0, "b"),
      $singlyLinkedList->getHead()
    );

    $singlyLinkedList->insertBeforeAt(1, "c");
    $singlyLinkedList->insertBeforeAt(-1, "d");

    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfter("a", "b"), null);
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), []);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfter("a", "b");
    $singlyLinkedList->insertAfter("a", "c");
    $singlyLinkedList->insertAfter("c", "d");

    $this->isEqual($singlyLinkedList->insertAfter("z", "y"), null);
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );
  }
}
