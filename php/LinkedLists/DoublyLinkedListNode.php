<?php

declare(strict_types=1);

namespace LinkedLists;

class DoublyLinkedListNode implements LinkedListNode
{
  public function __construct(
    private mixed $data,
    private ?DoublyLinkedListNode $next = null,
    private ?DoublyLinkedListNode $previous = null
  ) {
  }

  public function getData(): mixed
  {
    return $this->data;
  }

  public function next(
    ?DoublyLinkedListNode $node = null
  ): ?DoublyLinkedListNode {
    if ($node !== null) {
      $this->next = $node;
    }

    return $this->next;
  }

  public function previous(
    ?DoublyLinkedListNode $node = null
  ): ?DoublyLinkedListNode {
    if ($node !== null) {
      $this->previous = $node;
    }

    return $this->previous;
  }
}
