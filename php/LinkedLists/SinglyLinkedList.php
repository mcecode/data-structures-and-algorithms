<?php

declare(strict_types=1);

namespace LinkedLists;

use Interfaces\LinkedList;

class SinglyLinkedList implements LinkedList
{
  private ?SinglyLinkedListNode $head = null;
  private ?SinglyLinkedListNode $tail = null;

  public function getHead(): ?SinglyLinkedListNode
  {
    return $this->head;
  }

  public function getTail(): ?SinglyLinkedListNode
  {
    return $this->tail;
  }

  public function insertHead(mixed $value): SinglyLinkedListNode
  {
    $head = new SinglyLinkedListNode($value);

    if ($this->head !== null) {
      $head->next($this->head);
    }

    if ($this->tail === null) {
      $this->tail = $head;
    }

    $this->head = $head;
    return $head;
  }

  public function insertTail(mixed $value): SinglyLinkedListNode
  {
    $tail = new SinglyLinkedListNode($value);

    if ($this->tail !== null) {
      $this->tail->next($tail);
    }

    if ($this->head === null) {
      $this->head = $tail;
    }

    $this->tail = $tail;
    return $tail;
  }

  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): ?SinglyLinkedListNode {
    if ($this->head !== null && $this->head->getData() === $searchValue) {
      $this->insertHead($value);
      return $this->head;
    }

    $previousNode = null;
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($previousNode !== null && $currentNode->getData() === $searchValue) {
        return $previousNode->next(
          new SinglyLinkedListNode($value, $currentNode)
        );
      }

      $previousNode = $currentNode;
    }

    return null;
  }

  public function insertBeforeTail(mixed $value): ?SinglyLinkedListNode
  {
    if (
      $this->head !== null &&
      $this->head === $this->tail
    ) {
      $this->insertHead($value);
      return $this->head;
    }

    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->next() === $this->tail) {
        return $currentNode->next(
          new SinglyLinkedListNode($value, $this->tail)
        );
      }
    }

    return null;
  }

  public function insertBeforeAt(
    int $position,
    mixed $value
  ): ?SinglyLinkedListNode {
    $numberOfNodes = $this->count();

    if ($position < 0) {
      $position = $numberOfNodes + $position;
    }

    if (
      $numberOfNodes === 0 ||
      $position < 0 ||
      $numberOfNodes - 1 < $position
    ) {
      return null;
    }

    if ($position === 0) {
      $this->insertHead($value);
      return $this->head;
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $previousNode = $currentNode;
      $currentNode = $currentNode->next();
    }

    return $previousNode->next(new SinglyLinkedListNode($value, $currentNode));
  }

  public function insertAfter(
    mixed $searchValue,
    mixed $value
  ): ?SinglyLinkedListNode {
    if (
      $this->head !== null &&
      $this->head === $this->tail &&
      $this->head->getData() === $searchValue
    ) {
      $this->insertTail($value);
      return $this->tail;
    }

    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->getData() === $searchValue) {
        return $currentNode->next(
          new SinglyLinkedListNode($value, $currentNode->next())
        );
      }
    }

    return null;
  }

  public function insertAfterHead(mixed $value): ?SinglyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      $this->insertTail($value);
      return $this->tail;
    }

    return $this->head->next(
      new SinglyLinkedListNode($value, $this->head->next())
    );
  }

  public function insertAfterAt(
    int $position,
    mixed $value
  ): ?SinglyLinkedListNode {
    $numberOfNodes = $this->count();

    if ($position < 0) {
      $position = $numberOfNodes + $position;
    }

    if (
      $numberOfNodes === 0 ||
      $position < 0 ||
      $numberOfNodes - 1 < $position
    ) {
      return null;
    }

    if ($position === 0) {
      $this->insertAfterHead($value);
      return $this->head->next();
    }

    if ($numberOfNodes - 1 === $position) {
      $this->insertTail($value);
      return $this->tail;
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $currentNode = $currentNode->next();
    }

    return $currentNode->next(
      new SinglyLinkedListNode($value, $currentNode->next())
    );
  }

  public function insertBetween(
    mixed $beforeValue,
    mixed $afterValue,
    mixed $value
  ): ?SinglyLinkedListNode {
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if (
        $currentNode->getData() === $beforeValue &&
        $currentNode->next() !== null &&
        $currentNode->next()->getData() === $afterValue
      ) {
        return $currentNode->next(
          new SinglyLinkedListNode($value, $currentNode->next())
        );
      }
    }

    return null;
  }

  public function find(mixed $value): ?SinglyLinkedListNode
  {
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->getData() === $value) {
        return $currentNode;
      }
    }

    return null;
  }

  public function count(): int
  {
    if ($this->head === null) {
      return 0;
    }

    $numberOfNodes = 0;

    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      $numberOfNodes++;
    }

    return $numberOfNodes;
  }
}
