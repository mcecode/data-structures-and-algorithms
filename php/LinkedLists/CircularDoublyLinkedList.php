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

    if ($this->head === null) {
      $head->next($head);
    } else {
      $head->next($this->head);
    }

    if ($this->tail === null) {
      $head->previous($head);
      $this->tail = $head;
    } else {
      $this->tail->next($head);

      if ($this->head === $this->tail) {
        $this->tail->previous($head);
      }
    }

    return $this->head = $head;
  }

  public function insertTail(mixed $value): DoublyLinkedListNode
  {
  }

  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): ?DoublyLinkedListNode {
  }

  public function insertBeforeTail(mixed $value): ?DoublyLinkedListNode
  {
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
  }

  public function reverse(): ?DoublyLinkedListNode
  {
  }
}
