<?php

declare(strict_types=1);

namespace Tests\Base;

use ValueError;

abstract class LinkedListTestCase extends TestCase
{
  protected function turnLinkedListToArray(bool $usePrevious = false): array
  {
    // There is no need to check for the state of the tail because both head and
    // tail are always either 'null' or 'object' type.
    if ($this->linkedList->getHead() === null) {
      return [];
    }

    $array = [];

    if ($usePrevious) {
      $currentNode = $this->linkedList->getTail();

      if (!method_exists($currentNode, "previous")) {
        throw new ValueError(
          "'" .
            $this->linkedList::class .
            "' does not have a 'previous' method.",
          E_ERROR
        );
      }

      while ($currentNode !== null) {
        array_push($array, $currentNode->getData());
        $currentNode = $currentNode->previous();

        if ($currentNode === $this->linkedList->getTail()) {
          break;
        }
      }

      return array_reverse($array);
    }

    $currentNode = $this->linkedList->getHead();
    while ($currentNode !== null) {
      array_push($array, $currentNode->getData());
      $currentNode = $currentNode->next();

      if ($currentNode === $this->linkedList->getHead()) {
        break;
      }
    }

    return $array;
  }
}
