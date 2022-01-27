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
}
