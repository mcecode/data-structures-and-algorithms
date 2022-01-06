<?php

declare(strict_types=1);

namespace Interfaces;

interface LinkedList
{
  public function getHead(): LinkedListNode|null;
  public function getTail(): LinkedListNode|null;

  public function insertBeforeHead(mixed $value): LinkedListNode;
  public function insertBeforeTail(mixed $value): LinkedListNode;
  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): LinkedListNode|null;
  public function insertBeforeAt(
    int $position,
    mixed $value
  ): LinkedListNode|null;

  public function insertAfterHead(mixed $value): LinkedListNode;
  public function insertAfterTail(mixed $value): LinkedListNode;
  public function insertAfter(
    mixed $searchValue,
    mixed $value
  ): LinkedListNode|null;
  public function insertAfterAt(
    int $position,
    mixed $value
  ): LinkedListNode|null;

  public function insertBetween(
    mixed $beforeValue,
    mixed $afterValue,
    mixed $value
  ): LinkedListNode|null;

  public function find(mixed $value): LinkedListNode|null;
  public function findAt(int $position): LinkedListNode|null;

  public function replace(
    mixed $oldValue,
    mixed $newValue
  ): LinkedListNode|null;
  public function replaceAt(
    int $position,
    mixed $newValue
  ): LinkedListNode|null;

  public function delete(mixed $value): LinkedListNode|null;
  public function deleteAt(int $position): LinkedListNode|null;
  public function deleteHead(): LinkedListNode|null;
  public function deleteTail(): LinkedListNode|null;

  public function count(): int;
  public function reverse(): LinkedListNode|null;
}
