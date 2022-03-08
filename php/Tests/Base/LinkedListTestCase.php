<?php

declare(strict_types=1);

namespace Tests\Base;

use LinkedLists\LinkedList;

abstract class LinkedListTestCase extends TestCase
{
  protected function turnLinkedListToArray(LinkedList $linkedList): array
  {
    $array = [];

    $currentNode = $linkedList->getHead();
    while ($currentNode !== null) {
      array_push($array, $currentNode->getData());
      $currentNode = $currentNode->next();

      if ($currentNode === $linkedList->getHead()) {
        break;
      }
    }

    return $array;
  }
}
