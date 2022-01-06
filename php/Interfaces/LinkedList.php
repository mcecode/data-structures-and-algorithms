<?php

declare(strict_types=1);

namespace Interfaces;

interface LinkedList
{
  public function getHead(): ?LinkedListNode;
  public function getTail(): ?LinkedListNode;

  public function insertBeforeHead(mixed $value): LinkedListNode;
  public function insertBeforeTail(mixed $value): LinkedListNode;
  public function insertBefore(
    mixed $searchValue,
    mixed $value
  ): ?LinkedListNode;
  public function insertBeforeAt(
    int $position,
    mixed $value
  ): ?LinkedListNode;

  public function insertAfterHead(mixed $value): LinkedListNode;
  public function insertAfterTail(mixed $value): LinkedListNode;
  public function insertAfter(
    mixed $searchValue,
    mixed $value
  ): ?LinkedListNode;
  public function insertAfterAt(
    int $position,
    mixed $value
  ): ?LinkedListNode;

  public function insertBetween(
    mixed $beforeValue,
    mixed $afterValue,
    mixed $value
  ): ?LinkedListNode;

  public function find(mixed $value): ?LinkedListNode;
  public function findAt(int $position): ?LinkedListNode;

  public function replace(
    mixed $oldValue,
    mixed $newValue
  ): ?LinkedListNode;
  public function replaceAt(
    int $position,
    mixed $newValue
  ): ?LinkedListNode;

  public function delete(mixed $value): ?LinkedListNode;
  public function deleteAt(int $position): ?LinkedListNode;
  public function deleteHead(): ?LinkedListNode;
  public function deleteTail(): ?LinkedListNode;

  public function count(): int;
  public function reverse(): ?LinkedListNode;
}
