<?php

declare(strict_types=1);

namespace Abstracts;

use Interfaces\LinkedList;

abstract class LinkedListTest extends Test
{
  protected function turnLinkedListToArray(LinkedList $linkedList): array
  {
    $array = [];

    for (
      $currentNode = $linkedList->getHead();
      $currentNode !== null;
      $currentNode = $currentNode->next()
    ) {
      array_push($array, $currentNode->getData());
    }

    return $array;
  }
}
