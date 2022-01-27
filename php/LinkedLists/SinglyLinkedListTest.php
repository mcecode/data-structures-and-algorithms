<?php

declare(strict_types=1);

namespace LinkedLists;

use Abstracts\Test;

class SinglyLinkedListTest extends Test
{
  protected function run(): void
  {
    $singlyLinkedList = new SinglyLinkedList();

    $this->isTruthy($singlyLinkedList->getHead() === null);
    $this->isTruthy($singlyLinkedList->getTail() === null);

    $singlyLinkedList->insertHead("a");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "a");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "a");

    $singlyLinkedList->insertHead("b");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "b");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "a");

    $singlyLinkedList->insertHead("c");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "c");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "a");
    $this->isTruthy($singlyLinkedList->getHead()->next()->getData() === "b");

    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertTail("a");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "a");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "a");

    $singlyLinkedList->insertTail("b");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "b");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "a");

    $singlyLinkedList->insertTail("c");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "c");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "a");
    $this->isTruthy($singlyLinkedList->getHead()->next()->getData() === "b");
  }
}
