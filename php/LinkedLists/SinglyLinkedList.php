<?php

declare(strict_types=1);

namespace LinkedLists;

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

    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'SinglyLinkedListNode'.
    if ($this->head === null) {
      $this->tail = $head;
    } else {
      $head->next($this->head);
    }

    return $this->head = $head;
  }

  public function insertTail(mixed $value): SinglyLinkedListNode
  {
    $tail = new SinglyLinkedListNode($value);

    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'SinglyLinkedListNode'.
    if ($this->head === null) {
      $this->head = $tail;
    } else {
      $this->tail->next($tail);
    }

    return $this->tail = $tail;
  }

  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): ?SinglyLinkedListNode {
    if ($this->head === null) {
      return null;
    }

    if ($this->head->getData() === $searchValue) {
      return $this->insertHead($value);
    }

    $previousNode = null;
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->getData() === $searchValue) {
        return $previousNode?->next(
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
    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'SinglyLinkedListNode'.
    if ($this->head === null) {
      return null;
    }

    if ($this->tail->getData() === $searchValue) {
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
        $currentNode->next()?->getData() === $afterValue
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
    if ($this->head === null) {
      return null;
    }

    if ($this->head->getData() === $oldValue) {
      $newNode = new SinglyLinkedListNode($newValue, $this->head->next());

      if ($this->head === $this->tail) {
        $this->tail = $newNode;
      }

      return $this->head = $newNode;
    }

    $previousNode = null;
    for (
      $currentNode = $this->head;
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      if ($currentNode->getData() === $oldValue) {
        $previousNode?->next(
          new SinglyLinkedListNode($newValue, $currentNode->next())
        );

        if ($this->tail === $currentNode) {
          $this->tail = $previousNode?->next();
        }

        return $previousNode?->next();
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
      $newNode = new SinglyLinkedListNode($newValue, $this->head->next());

      if ($this->head === $this->tail) {
        $this->tail = $newNode;
      }

      return $this->head = $newNode;
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $previousNode = $currentNode;
      $currentNode = $currentNode->next();
    }

    $previousNode->next(
      new SinglyLinkedListNode($newValue, $currentNode->next())
    );

    if ($position === $numberOfNodes - 1) {
      $this->tail = $previousNode->next();
    }

    return $previousNode->next();
  }

  public function deleteHead(): ?SinglyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      $previousHead = $this->head;
      $this->head = $this->tail = null;
      return $previousHead;
    }

    $previousHead = $this->head;
    $this->head = $this->head->next();
    return $previousHead;
  }

  public function deleteTail(): ?SinglyLinkedListNode
  {
    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'DoublyLinkedListNode'.
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      $previousTail = $this->tail;
      $this->head = $this->tail = null;
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
          $this->head->resetNext();
          $this->tail = $this->head;
        } else {
          $currentNode->resetNext();
          $previousNode->next($currentNode);
          $this->tail = $currentNode;
        }

        return $previousTail;
      }

      $previousNode = $currentNode;
    }
  }

  public function delete(mixed $value): ?SinglyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head->getData() === $value) {
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

  public function deleteAt(int $position): ?SinglyLinkedListNode
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

    if ($position === 0 && $this->head === $this->tail) {
      $previousHeadAndTail = $this->head;
      $this->head = null;
      $this->tail = null;
      return $previousHeadAndTail;
    }

    if ($position === 0) {
      return $this->deleteHead();
    }

    if ($numberOfNodes - 1 === $position) {
      return $this->deleteTail();
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $previousNode = $currentNode;
      $currentNode = $currentNode->next();
    }

    $previousNode->next($currentNode->next());
    return $currentNode;
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

  // This implementation of reversing a singly linked list was inspired by
  // https://github.com/trekhleb/javascript-algorithms/blob/7a37a6b86e76ee22bf93ffd9d01d7acfd79d0714/src/data-structures/linked-list/LinkedList.js#L249
  public function reverse(): ?SinglyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      return $this->head;
    }

    $currentNode = $this->head;
    $previousNode = null;

    while ($currentNode !== null) {
      $nextNode = $currentNode->next();

      $currentNode->next($previousNode);

      $previousNode = $currentNode;
      $currentNode = $nextNode;
    }

    $this->head->resetNext();
    $this->tail = $this->head;
    return $this->head = $previousNode;
  }
}
