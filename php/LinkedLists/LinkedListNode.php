<?php

declare(strict_types=1);

namespace LinkedLists;

interface LinkedListNode
{
  public function getData(): mixed;
  public function next(): ?LinkedListNode;
}
