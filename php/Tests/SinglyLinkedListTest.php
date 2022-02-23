<?php

declare(strict_types=1);

namespace Tests;

use LinkedLists\SinglyLinkedList;
use Tests\Base\LinkedListTest;

class SinglyLinkedListTest extends LinkedListTest
{
  protected function run(): void
  {
    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "c");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertTail("c");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "c");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertBefore("a", "b"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $singlyLinkedList->insertBefore("a", "c");
    $singlyLinkedList->insertBefore("c", "d");

    $this->isIdentical($singlyLinkedList->insertBefore("z", "y"), null);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "b");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "d", "c", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertBeforeTail("a"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBeforeTail("b");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "b");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");

    $singlyLinkedList->insertBeforeTail("c");
    $singlyLinkedList->insertBeforeTail("d");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "b");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertBeforeAt(0, "a"), null);
    $this->isIdentical($singlyLinkedList->insertBeforeAt(1, "a"), null);
    $this->isIdentical($singlyLinkedList->insertBeforeAt(-1, "a"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");

    $this->isIdentical(
      $singlyLinkedList->insertBeforeAt(0, "b"),
      $singlyLinkedList->getHead()
    );

    $singlyLinkedList->insertBeforeAt(1, "c");
    $singlyLinkedList->insertBeforeAt(-1, "d");
    $singlyLinkedList->insertBeforeAt(1, "e");

    $this->isIdentical($singlyLinkedList->insertBeforeAt(5, "e"), null);
    $this->isIdentical($singlyLinkedList->insertBeforeAt(-6, "e"), null);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "b");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "e", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertAfter("a", "b"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfter("a", "b");
    $singlyLinkedList->insertAfter("a", "c");
    $singlyLinkedList->insertAfter("c", "d");

    $this->isIdentical($singlyLinkedList->insertAfter("z", "y"), null);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertAfterHead("a"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfterHead("b");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");

    $singlyLinkedList->insertAfterHead("c");
    $singlyLinkedList->insertAfterHead("d");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "d", "c", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertAfterAt(0, "a"), null);
    $this->isIdentical($singlyLinkedList->insertAfterAt(1, "a"), null);
    $this->isIdentical($singlyLinkedList->insertAfterAt(-1, "a"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");

    $this->isIdentical(
      $singlyLinkedList->insertAfterAt(0, "b"),
      $singlyLinkedList->getTail()
    );

    $singlyLinkedList->insertAfterAt(1, "c");
    $singlyLinkedList->insertAfterAt(-1, "d");
    $singlyLinkedList->insertAfterAt(1, "e");

    $this->isIdentical($singlyLinkedList->insertAfterAt(5, "e"), null);
    $this->isIdentical($singlyLinkedList->insertAfterAt(-6, "e"), null);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "d");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "e", "c", "d"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->insertBetween("a", "b", "c"), null);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertBetween("a", "b", "c");
    $singlyLinkedList->insertBetween("c", "b", "d");

    $this->isIdentical($singlyLinkedList->insertBetween("c", "b", "d"), null);
    $this->isIdentical($singlyLinkedList->insertBetween("z", "y", "x"), null);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->find("a"), null);

    $this->isIdentical($singlyLinkedList->findAt(0), null);
    $this->isIdentical($singlyLinkedList->findAt(1), null);
    $this->isIdentical($singlyLinkedList->findAt(-1), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isIdentical($singlyLinkedList->find("b")->getData(), "b");
    $this->isIdentical(
      $singlyLinkedList->find("c"),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->find("a"),
      $singlyLinkedList->getTail()
    );

    $this->isIdentical($singlyLinkedList->findAt(1)->getData(), "b");
    $this->isIdentical($singlyLinkedList->findAt(-2)->getData(), "b");
    $this->isIdentical(
      $singlyLinkedList->findAt(0),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->findAt(-3),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->findAt(2),
      $singlyLinkedList->getTail()
    );
    $this->isIdentical(
      $singlyLinkedList->findAt(-1),
      $singlyLinkedList->getTail()
    );
    $this->isIdentical($singlyLinkedList->findAt(5), null);
    $this->isIdentical($singlyLinkedList->findAt(-6), null);

    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->replace("a", "d"), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isIdentical($singlyLinkedList->replace("b", "e")->getData(), "e");
    $this->isIdentical(
      $singlyLinkedList->replace("c", "f"),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->replace("a", "d"),
      $singlyLinkedList->getTail()
    );
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "f");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "d");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["f", "e", "d"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->replaceAt(0, "a"), null);
    $this->isIdentical($singlyLinkedList->replaceAt(1, "a"), null);
    $this->isIdentical($singlyLinkedList->replaceAt(-1, "a"), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isIdentical($singlyLinkedList->replaceAt(1, "d")->getData(), "d");
    $this->isIdentical(
      $singlyLinkedList->replaceAt(0, "e"),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->replaceAt(2, "f"),
      $singlyLinkedList->getTail()
    );
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["e", "d", "f"]
    );
    $this->isIdentical($singlyLinkedList->replaceAt(-2, "g")->getData(), "g");
    $this->isIdentical(
      $singlyLinkedList->replaceAt(-3, "h"),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->replaceAt(-1, "i"),
      $singlyLinkedList->getTail()
    );
    $this->isIdentical($singlyLinkedList->replaceAt(5, "i"), null);
    $this->isIdentical($singlyLinkedList->replaceAt(-6, "i"), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["h", "g", "i"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->deleteHead(), null);

    $singlyLinkedList->insertHead("a");

    $previousHead = $singlyLinkedList->getHead();
    $this->isIdentical($singlyLinkedList->deleteHead(), $previousHead);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");

    $previousHead = $singlyLinkedList->getHead();
    $this->isIdentical($singlyLinkedList->deleteHead(), $previousHead);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertHead("c");
    $singlyLinkedList->insertHead("d");

    $previousHead = $singlyLinkedList->getHead();
    $this->isIdentical($singlyLinkedList->deleteHead(), $previousHead);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "c");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->deleteTail(), null);

    $singlyLinkedList->insertTail("a");

    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->deleteTail(), $previousTail);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");

    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->deleteTail(), $previousTail);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertTail("c");
    $singlyLinkedList->insertTail("d");

    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->deleteTail(), $previousTail);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "c");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->delete("a"), null);

    $singlyLinkedList->insertHead("a");

    $previousHead = $singlyLinkedList->getHead();
    $previousTail = $singlyLinkedList->getTail();
    $deletedNode = $singlyLinkedList->delete("a");
    $this->isIdentical($deletedNode, $previousHead);
    $this->isIdentical($deletedNode, $previousTail);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");

    $previousHead = $singlyLinkedList->getHead();
    $this->isIdentical($singlyLinkedList->delete("b"), $previousHead);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertHead("b");

    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->delete("a"), $previousTail);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "b");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["b"]);

    $singlyLinkedList->insertHead("c");
    $singlyLinkedList->insertHead("d");
    $singlyLinkedList->delete("c");

    $this->isIdentical($singlyLinkedList->getHead()->getData(), "d");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["d", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->deleteAt(0), null);
    $this->isIdentical($singlyLinkedList->deleteAt(1), null);
    $this->isIdentical($singlyLinkedList->deleteAt(-1), null);

    $singlyLinkedList->insertHead("a");

    $previousHead = $singlyLinkedList->getHead();
    $previousTail = $singlyLinkedList->getTail();
    $deletedNode = $singlyLinkedList->deleteAt(0);
    $this->isIdentical($deletedNode, $previousHead);
    $this->isIdentical($deletedNode, $previousTail);
    $this->isIdentical($singlyLinkedList->getHead(), null);
    $this->isIdentical($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");

    $previousHead = $singlyLinkedList->getHead();
    $this->isIdentical($singlyLinkedList->deleteAt(0), $previousHead);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "a");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "a");
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertHead("b");

    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->deleteAt(-1), $previousTail);
    $this->isIdentical($singlyLinkedList->getHead()->getData(), "b");
    $this->isIdentical($singlyLinkedList->getTail()->getData(), "b");
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["b"]);

    $singlyLinkedList->insertHead("c");
    $singlyLinkedList->insertHead("d");
    $singlyLinkedList->insertHead("e");
    $singlyLinkedList->insertHead("f");
    $singlyLinkedList->insertHead("g");

    $previousHead = $singlyLinkedList->getHead();
    $this->isIdentical($singlyLinkedList->deleteAt(-6), $previousHead);
    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->deleteAt(4), $previousTail);
    $singlyLinkedList->deleteAt(1);
    $singlyLinkedList->deleteAt(-2);
    $this->isIdentical($singlyLinkedList->deleteAt(5), null);
    $this->isIdentical($singlyLinkedList->deleteAt(-6), null);
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["f", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->count(), 0);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isIdentical($singlyLinkedList->count(), 3);

    $singlyLinkedList = new SinglyLinkedList();

    $this->isIdentical($singlyLinkedList->reverse(), null);

    $singlyLinkedList->insertHead("a");

    $this->isIdentical(
      $singlyLinkedList->reverse(),
      $singlyLinkedList->getHead()
    );
    $this->isIdentical(
      $singlyLinkedList->reverse(),
      $singlyLinkedList->getTail()
    );
    $this->isIdentical($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $previousTail = $singlyLinkedList->getTail();
    $this->isIdentical($singlyLinkedList->reverse(), $previousTail);
    $this->isIdentical(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "c"]
    );
  }
}
