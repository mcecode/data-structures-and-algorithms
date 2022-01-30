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
        $previousNode->next(new SinglyLinkedListNode($value, $currentNode));
        return $previousNode->next();
      }

      $previousNode = $currentNode;
    }

    return null;
  }

  public function insertBeforeTail(mixed $value): ?SinglyLinkedListNode
  {
    if (
      $this->head !== null &&
      $this->tail !== null &&
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
        $currentNode->next(new SinglyLinkedListNode($value, $this->tail));
        return $currentNode->next();
      }
    }

    return null;
  }
}
