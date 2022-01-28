<?php

declare(strict_types=1);

namespace LinkedLists;

use Abstracts\Test;

class SinglyLinkedListTest extends Test
{
  protected function run(): void
  {
    // TODO: Simplify these tests

    $singlyLinkedList = new SinglyLinkedList();

    $this->isTruthy($singlyLinkedList->getHead() === null);
    $this->isTruthy($singlyLinkedList->getTail() === null);

    // Output list should be c->b->a
    $singlyLinkedList = new SinglyLinkedList();

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

    // Output list should be a->b->c
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

    // Output list should be b->d->c->a
    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "b");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "a");

    $singlyLinkedList->insertBefore("a", "c");
    $this->isTruthy($singlyLinkedList->getHead()->getData() === "b");
    $this->isTruthy($singlyLinkedList->getTail()->getData() === "a");
    $this->isTruthy($singlyLinkedList->getHead()->next()->getData() === "c");

    $singlyLinkedList->insertBefore("c", "d");
    $this->isTruthy($singlyLinkedList->getHead()->next()->getData() === "d");
  }
}
