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

    // There is no need to check for the state of '$this->tail' because
    // both '$this->head' and $this->tail' are always either 'null' or instances
    // of 'DoublyLinkedListNode'.
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

    // There is no need to check for the state of '$this->tail' because
    // both '$this->head' and $this->tail' are always either 'null' or instances
    // of 'DoublyLinkedListNode'.
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
        $previousNode = $currentNode->previous();
        $newNode = $currentNode->previous(
          new DoublyLinkedListNode($value, $currentNode, $previousNode)
        );
        return $previousNode->next($newNode);
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

    $previousNode = $this->tail->previous();
    $newNode = $this->tail->previous(
      new DoublyLinkedListNode($value, $this->tail, $previousNode)
    );
    return $previousNode->next($newNode);
  }

  public function insertBeforeAt(
    int $position,
    mixed $value
  ): ?DoublyLinkedListNode {
  }

  public function insertAfter(
    mixed $searchValue,
    mixed $value
  ): ?DoublyLinkedListNode {
  }

  public function insertAfterHead(mixed $value): ?DoublyLinkedListNode
  {
  }

  public function insertAfterAt(
    int $position,
    mixed $value
  ): ?DoublyLinkedListNode {
  }

  public function insertBetween(
    mixed $beforeValue,
    mixed $afterValue,
    mixed $value
  ): ?DoublyLinkedListNode {
  }

  public function find(mixed $value): ?DoublyLinkedListNode
  {
  }

  public function findAt(int $position): ?DoublyLinkedListNode
  {
  }

  public function replace(
    mixed $oldValue,
    mixed $newValue
  ): ?DoublyLinkedListNode {
  }

  public function replaceAt(
    int $position,
    mixed $newValue
  ): ?DoublyLinkedListNode {
  }

  public function deleteHead(): ?DoublyLinkedListNode
  {
  }

  public function deleteTail(): ?DoublyLinkedListNode
  {
  }

  public function delete(mixed $value): ?DoublyLinkedListNode
  {
  }

  public function deleteAt(int $position): ?DoublyLinkedListNode
  {
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
  }
}
