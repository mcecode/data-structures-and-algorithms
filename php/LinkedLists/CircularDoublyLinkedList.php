<?php

declare(strict_types=1);

namespace LinkedLists;

class CircularDoublyLinkedList implements LinkedList
{
  private ?DoublyLinkedListNode $head = null;
  private ?DoublyLinkedListNode $tail = null;

  public function getHead(): ?DoublyLinkedListNode
  {
    return $this->head;
  }

  public function getTail(): ?DoublyLinkedListNode
  {
    return $this->tail;
  }

  public function insertHead(mixed $value): DoublyLinkedListNode
  {
    $head = new DoublyLinkedListNode($value, previous: $this->tail);

    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'DoublyLinkedListNode'.
    if ($this->head === null) {
      $head->next($head);
      $head->previous($head);
      $this->tail = $head;
    } else {
      $head->next($this->head);
      $this->head->previous($head);
      $this->tail->next($head);

      if ($this->head === $this->tail) {
        $this->tail->previous($head);
      }
    }

    return $this->head = $head;
  }

  public function insertTail(mixed $value): DoublyLinkedListNode
  {
    $tail = new DoublyLinkedListNode($value, $this->head);

    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'DoublyLinkedListNode'.
    if ($this->head === null) {
      $tail->next($tail);
      $tail->previous($tail);
      $this->head = $tail;
    } else {
      $tail->previous($this->tail);
      $this->head->previous($tail);
      $this->tail->next($tail);
    }

    return $this->tail = $tail;
  }

  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): ?DoublyLinkedListNode {
    if ($this->head === null) {
      return null;
    }

    if ($this->head->getData() === $searchValue) {
      return $this->insertHead($value);
    }

    $currentNode = $this->head;
    do {
      if ($currentNode->getData() === $searchValue) {
        $newNode = new DoublyLinkedListNode(
          $value,
          $currentNode,
          $currentNode->previous()
        );
        $currentNode->previous()->next($newNode);
        return $currentNode->previous($newNode);
      }

      $currentNode = $currentNode->next();
    } while ($currentNode !== $this->head);

    return null;
  }

  public function insertBeforeTail(mixed $value): ?DoublyLinkedListNode
  {
    if ($this->tail === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      return $this->insertHead($value);
    }

    $newNode = new DoublyLinkedListNode(
      $value,
      $this->tail,
      $this->tail->previous()
    );
    $this->tail->previous()->next($newNode);
    return $this->tail->previous($newNode);
  }

  public function insertBeforeAt(
    int $position,
    mixed $value
  ): ?DoublyLinkedListNode {
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
      $currentNode = $currentNode->next();
    }

    $newNode = new DoublyLinkedListNode(
      $value,
      $currentNode,
      $currentNode->previous()
    );
    $currentNode->previous()->next($newNode);
    return $currentNode->previous($newNode);
  }

  public function insertAfter(
    mixed $searchValue,
    mixed $value
  ): ?DoublyLinkedListNode {
    // There is no need to check for the state of '$this->tail' because both
    // '$this->head' and $this->tail' are always either 'null' or instances of
    // 'DoublyLinkedListNode'.
    if ($this->head === null) {
      return null;
    }

    if ($this->tail->getData() === $searchValue) {
      return $this->insertTail($value);
    }

    $currentNode = $this->head;
    do {
      if ($currentNode->getData() === $searchValue) {
        $newNode = new DoublyLinkedListNode(
          $value,
          $currentNode->next(),
          $currentNode
        );
        $currentNode->next()->previous($newNode);
        return $newNode = $currentNode->next($newNode);
      }

      $currentNode = $currentNode->next();
    } while ($currentNode !== $this->head);

    return null;
  }

  public function insertAfterHead(mixed $value): ?DoublyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      return $this->insertTail($value);
    }

    $newNode = new DoublyLinkedListNode(
      $value,
      $this->head->next(),
      $this->head
    );
    $this->head->next()->previous($newNode);
    return $this->head->next($newNode);
  }

  public function insertAfterAt(
    int $position,
    mixed $value
  ): ?DoublyLinkedListNode {
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

    $newNode = new DoublyLinkedListNode(
      $value,
      $currentNode->next(),
      $currentNode
    );
    $currentNode->next()->previous($newNode);
    return $currentNode->next($newNode);
  }

  public function insertBetween(
    mixed $beforeValue,
    mixed $afterValue,
    mixed $value
  ): ?DoublyLinkedListNode {
    $currentNode = $this->head;
    do {
      if (
        $currentNode?->getData() === $beforeValue &&
        $currentNode?->next() !== $this->head &&
        $currentNode?->next()->getData() === $afterValue
      ) {
        $newNode = new DoublyLinkedListNode(
          $value,
          $currentNode->next(),
          $currentNode
        );
        $currentNode->next()->previous($newNode);
        return $newNode = $currentNode->next($newNode);
      }

      $currentNode = $currentNode?->next();
    } while ($currentNode !== $this->head);

    return null;
  }

  public function find(mixed $value): ?DoublyLinkedListNode
  {
    $currentNode = $this->head;
    do {
      if ($currentNode?->getData() === $value) {
        return $currentNode;
      }

      $currentNode = $currentNode?->next();
    } while ($currentNode !== $this->head);

    return null;
  }

  public function findAt(int $position): ?DoublyLinkedListNode
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
  ): ?DoublyLinkedListNode {
    if ($this->head === null) {
      return null;
    }

    $newNode = new DoublyLinkedListNode($newValue);

    if ($this->head->getData() === $oldValue && $this->head === $this->tail) {
      $newNode->next($newNode);
      $newNode->previous($newNode);
      return $this->head = $this->tail = $newNode;
    }

    $currentNode = $this->head;
    do {
      if ($currentNode->getData() === $oldValue) {
        $newNode->next($currentNode->next());
        $newNode->previous($currentNode->previous());
        $currentNode->next()->previous($newNode);
        $currentNode->previous()->next($newNode);

        if ($this->head === $currentNode) {
          $this->head = $newNode;
        }

        if ($this->tail === $currentNode) {
          $this->tail = $newNode;
        }

        return $newNode;
      }

      $currentNode = $currentNode->next();
    } while ($currentNode !== $this->head);

    return null;
  }

  public function replaceAt(
    int $position,
    mixed $newValue
  ): ?DoublyLinkedListNode {
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

    $newNode = new DoublyLinkedListNode($newValue);

    if ($position === 0 && $this->head === $this->tail) {
      $newNode->next($newNode);
      $newNode->previous($newNode);
      return $this->head = $this->tail = $newNode;
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $currentNode = $currentNode->next();
    }

    $newNode->next($currentNode->next());
    $newNode->previous($currentNode->previous());
    $currentNode->next()->previous($newNode);
    $currentNode->previous()->next($newNode);

    if ($position === 0) {
      $this->head = $newNode;
    }

    if ($position === $numberOfNodes - 1) {
      $this->tail = $newNode;
    }

    return $newNode;
  }

  public function deleteHead(): ?DoublyLinkedListNode
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
    $this->head->previous($this->tail);
    $this->tail->next($this->head);
    return $previousHead;
  }

  public function deleteTail(): ?DoublyLinkedListNode
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

    $previousTail = $this->tail;
    $this->tail = $this->tail->previous();
    $this->tail->next($this->head);
    $this->head->previous($this->tail);
    return $previousTail;
  }

  public function delete(mixed $value): ?DoublyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head->getData() === $value) {
      return $this->deleteHead();
    }

    $currentNode = $this->head;
    do {
      if ($currentNode->getData() === $value) {
        if ($currentNode === $this->tail) {
          return $this->deleteTail();
        }

        $currentNode->next()->previous($currentNode->previous());
        $currentNode->previous()->next($currentNode->next());

        return $currentNode;
      }

      $currentNode = $currentNode->next();
    } while ($currentNode !== $this->head);

    return null;
  }

  public function deleteAt(int $position): ?DoublyLinkedListNode
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

    if ($position === 0) {
      return $this->deleteHead();
    }

    if ($position === $numberOfNodes - 1) {
      return $this->deleteTail();
    }

    $currentNode = $this->head;

    for ($i = 0; $i < $position; $i++) {
      $currentNode = $currentNode->next();
    }

    $currentNode->next()->previous($currentNode->previous());
    $currentNode->previous()->next($currentNode->next());
    return $currentNode;
  }

  public function count(): int
  {
    if ($this->head === null) {
      return 0;
    }

    $numberOfNodes = 0;

    $currentNode = $this->head;
    do {
      $numberOfNodes++;

      $currentNode = $currentNode->next();
    } while ($currentNode !== $this->head);

    return $numberOfNodes;
  }

  public function reverse(): ?DoublyLinkedListNode
  {
    if ($this->head === null) {
      return null;
    }

    if ($this->head === $this->tail) {
      return $this->head;
    }

    $currentNode = $this->head;
    $previousNode = $this->tail;

    do {
      $nextNode = $currentNode->next();

      $currentNode->next($previousNode);
      $currentNode->previous($nextNode);

      $previousNode = $currentNode;
      $currentNode = $nextNode;
    } while ($currentNode !== $this->head);

    $this->tail = $this->head;
    return $this->head = $previousNode;
  }
}
