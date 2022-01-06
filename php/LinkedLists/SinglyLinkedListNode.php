<?php

declare(strict_types=1);

namespace LinkedLists;

use Interfaces\LinkedListNode;

class SinglyLinkedListNode implements LinkedListNode
{
  public function __construct(
    private mixed $data,
    private LinkedListNode|null $next = null
  ) {
  }

  public function getData(): mixed
  {
    return $this->data;
  }

  public function getNext(): mixed
  {
    return $this->next;
  }
}
