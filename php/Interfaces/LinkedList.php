<?php

declare(strict_types=1);

namespace Interfaces;

interface LinkedList
{
  public function get_head(): LinkedListNode|null;
  public function get_tail(): LinkedListNode|null;

  public function insert_before_head(mixed $value): LinkedListNode;
  public function insert_before_tail(mixed $value): LinkedListNode;
  public function insert_before(
    mixed $search_value,
    mixed $value
  ): LinkedListNode|null;
  public function insert_before_at(
    int $position,
    mixed $value
  ): LinkedListNode|null;

  public function insert_after_head(mixed $value): LinkedListNode;
  public function insert_after_tail(mixed $value): LinkedListNode;
  public function insert_after(
    mixed $search_value,
    mixed $value
  ): LinkedListNode|null;
  public function insert_after_at(
    int $position,
    mixed $value
  ): LinkedListNode|null;

  public function insert_between(
    mixed $before_value,
    mixed $after_value,
    mixed $value
  ): LinkedListNode|null;

  public function find(mixed $value): LinkedListNode|null;
  public function find_at(int $position): LinkedListNode|null;

  public function update(
    mixed $old_value,
    mixed $new_value
  ): LinkedListNode|null;
  public function update_at(
    int $position,
    mixed $new_value
  ): LinkedListNode|null;

  public function delete(mixed $value): LinkedListNode|null;
  public function delete_at(int $position): LinkedListNode|null;
  public function delete_head(): LinkedListNode|null;
  public function delete_tail(): LinkedListNode|null;

  public function count(): int;
  public function reverse(): LinkedListNode|null;
}
