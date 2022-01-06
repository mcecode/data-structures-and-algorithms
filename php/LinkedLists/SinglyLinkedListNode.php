<?php

declare(strict_types=1);

namespace LinkedLists;

use Interfaces\LinkedListNode;

class SinglyLinkedListNode implements LinkedListNode
{
  public function __construct(
    private mixed $data,
    private ?SinglyLinkedListNode $next = null
  ) {
  }

  public function getData(): mixed
  {
    return $this->data;
  }

  public function next(?SinglyLinkedListNode $node = null): mixed
  {
    if ($node !== null) {
      $this->next = $node;
    }

    return $this->next;
  }
}
