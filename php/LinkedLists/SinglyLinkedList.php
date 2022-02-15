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

    return $this->head = $head;
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

    return $this->tail = $tail;
  }

  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): ?SinglyLinkedListNode {
    if ($this->head !== null && $this->head->getData() === $searchValue) {
      return $this->insertHead($value);
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
      return $this->insertHead($value);
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
      return $this->insertHead($value);
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
      return $this->insertTail($value);
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
      return $this->insertTail($value);
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
      return $this->insertAfterHead($value);
    }

    if ($numberOfNodes - 1 === $position) {
      return $this->insertTail($value);
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

  public function findAt(int $position): ?SinglyLinkedListNode
  {
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

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $currentNode = $currentNode->next();
    }

    return $currentNode;
  }

  public function replace(
    mixed $oldValue,
    mixed $newValue
  ): ?SinglyLinkedListNode {
    if ($this->head !== null && $this->head->getData() === $oldValue) {
      return $this->head = new SinglyLinkedListNode(
        $newValue,
        $this->head->next()
      );
    }

    $previousNode = null;
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($previousNode !== null && $currentNode->getData() === $oldValue) {
        $previousNode->next(
          new SinglyLinkedListNode($newValue, $currentNode->next())
        );

        if ($currentNode === $this->tail) {
          $this->tail = $previousNode->next();
        }

        return $previousNode->next();
      }

      $previousNode = $currentNode;
    }

    return null;
  }

  public function replaceAt(
    int $position,
    mixed $newValue
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
      return $this->head = new SinglyLinkedListNode(
        $newValue,
        $this->head->next()
      );
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $previousNode = $currentNode;
      $currentNode = $currentNode->next();
    }

    $newNode = $previousNode->next(
      new SinglyLinkedListNode($newValue, $currentNode->next())
    );

    if ($numberOfNodes - 1 === $position) {
      $this->tail = $newNode;
    }

    return $newNode;
  }

  public function deleteHead(): ?SinglyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      $previousHead = $this->head;
      $this->head = null;
      $this->tail = null;
      return $previousHead;
    }

    $previousHead = $this->head;
    $this->head = $this->head->next();
    return $previousHead;
  }

  public function deleteTail(): ?SinglyLinkedListNode
  {
    if ($this->tail === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      $previousTail = $this->tail;
      $this->head = null;
      $this->tail = null;
      return $previousTail;
    }

    $previousNode = null;
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->next() === $this->tail) {
        $previousTail = $this->tail;

        if ($previousNode === null) {
          $this->head = new SinglyLinkedListNode($this->head->getData());
          $this->tail = $this->head;
        } else {
          $previousNode->next(
            new SinglyLinkedListNode($currentNode->getData())
          );
          $this->tail = $previousNode->next();
        }

        return $previousTail;
      }

      $previousNode = $currentNode;
    }
  }

  public function delete(mixed $value): ?SinglyLinkedListNode
  {
    if ($this->head?->getData() === $value && $this->head === $this->tail) {
      $previousHeadAndTail = $this->head;
      $this->head = null;
      $this->tail = null;
      return $previousHeadAndTail;
    }

    if ($this->head?->getData() === $value) {
      return $this->deleteHead();
    }

    $previousNode = null;
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->getData() === $value) {
        if ($currentNode === $this->tail) {
          return $this->deleteTail();
        }

        $previousNode?->next($currentNode->next());
        return $currentNode;
      }

      $previousNode = $currentNode;
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
