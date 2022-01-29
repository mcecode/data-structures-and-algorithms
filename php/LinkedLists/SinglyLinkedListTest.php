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

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "c");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertTail("c");

    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBefore("a", "b"), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $singlyLinkedList->insertBefore("a", "c");
    $singlyLinkedList->insertBefore("c", "d");

    $this->isEqual($singlyLinkedList->insertBefore("z", "y"), null);
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "d", "c", "a"]
    );
  }
}
