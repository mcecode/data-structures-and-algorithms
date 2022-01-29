<?php

declare(strict_types=1);

namespace Interfaces;

interface LinkedListNode
{
  public function getData(): mixed;
  public function next(): ?LinkedListNode;
}
