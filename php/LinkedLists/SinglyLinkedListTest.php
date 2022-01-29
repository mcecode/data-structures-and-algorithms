<?php

declare(strict_types=1);

namespace LinkedLists;

use Abstracts\LinkedListTest;

class SinglyLinkedListTest extends LinkedListTest
{
  protected function run(): void
  {
    $singlyLinkedList = new SinglyLinkedList();

    $this->isTruthy($singlyLinkedList->getHead() === null);
    $this->isTruthy($singlyLinkedList->getTail() === null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isTruthy(
      $this->turnLinkedListToArray($singlyLinkedList) === ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertTail("c");

    $this->isTruthy(
      $this->turnLinkedListToArray($singlyLinkedList) === ["a", "b", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isTruthy($singlyLinkedList->insertBefore("a", "b") === null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $singlyLinkedList->insertBefore("a", "c");
    $singlyLinkedList->insertBefore("c", "d");

    $this->isTruthy(
      $this->turnLinkedListToArray($singlyLinkedList) === ["b", "d", "c", "a"]
    );
    $this->isTruthy($singlyLinkedList->insertBefore("z", "y") === null);
  }
}
