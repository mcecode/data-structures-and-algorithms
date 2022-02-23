<?php

declare(strict_types=1);

namespace Tests\Base;

use LinkedLists\LinkedList;

abstract class LinkedListTestCase extends TestCase
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
