<?php

declare(strict_types=1);

namespace LinkedLists;

use Abstracts\LinkedListTest;

class SinglyLinkedListTest extends LinkedListTest
{
  protected function run(): void
  {
    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "c");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertTail("c");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "c");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "c"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBefore("a", "b"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBefore("a", "b");
    $singlyLinkedList->insertBefore("a", "c");
    $singlyLinkedList->insertBefore("c", "d");

    $this->isEqual($singlyLinkedList->insertBefore("z", "y"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "d", "c", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBeforeTail("a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertBeforeTail("b");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");

    $singlyLinkedList->insertBeforeTail("c");
    $singlyLinkedList->insertBeforeTail("d");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBeforeAt(0, "a"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(1, "a"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(-1, "a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");

    $this->isEqual(
      $singlyLinkedList->insertBeforeAt(0, "b"),
      $singlyLinkedList->getHead()
    );

    $singlyLinkedList->insertBeforeAt(1, "c");
    $singlyLinkedList->insertBeforeAt(-1, "d");
    $singlyLinkedList->insertBeforeAt(1, "e");

    $this->isEqual($singlyLinkedList->insertBeforeAt(5, "e"), null);
    $this->isEqual($singlyLinkedList->insertBeforeAt(-6, "e"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["b", "e", "c", "d", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfter("a", "b"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfter("a", "b");
    $singlyLinkedList->insertAfter("a", "c");
    $singlyLinkedList->insertAfter("c", "d");

    $this->isEqual($singlyLinkedList->insertAfter("z", "y"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfterHead("a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertAfterHead("b");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");

    $singlyLinkedList->insertAfterHead("c");
    $singlyLinkedList->insertAfterHead("d");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "d", "c", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertAfterAt(0, "a"), null);
    $this->isEqual($singlyLinkedList->insertAfterAt(1, "a"), null);
    $this->isEqual($singlyLinkedList->insertAfterAt(-1, "a"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");

    $this->isEqual(
      $singlyLinkedList->insertAfterAt(0, "b"),
      $singlyLinkedList->getTail()
    );

    $singlyLinkedList->insertAfterAt(1, "c");
    $singlyLinkedList->insertAfterAt(-1, "d");
    $singlyLinkedList->insertAfterAt(1, "e");

    $this->isEqual($singlyLinkedList->insertAfterAt(5, "e"), null);
    $this->isEqual($singlyLinkedList->insertAfterAt(-6, "e"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "d");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "b", "e", "c", "d"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->insertBetween("a", "b", "c"), null);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");
    $singlyLinkedList->insertBetween("a", "b", "c");
    $singlyLinkedList->insertBetween("c", "b", "d");

    $this->isEqual($singlyLinkedList->insertBetween("c", "b", "d"), null);
    $this->isEqual($singlyLinkedList->insertBetween("z", "y", "x"), null);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["a", "c", "d", "b"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->find("a"), null);

    $this->isEqual($singlyLinkedList->findAt(0), null);
    $this->isEqual($singlyLinkedList->findAt(1), null);
    $this->isEqual($singlyLinkedList->findAt(-1), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->find("b")->getData(), "b");
    $this->isEqual($singlyLinkedList->find("c"), $singlyLinkedList->getHead());
    $this->isEqual($singlyLinkedList->find("a"), $singlyLinkedList->getTail());

    $this->isEqual($singlyLinkedList->findAt(1)->getData(), "b");
    $this->isEqual($singlyLinkedList->findAt(-2)->getData(), "b");
    $this->isEqual($singlyLinkedList->findAt(0), $singlyLinkedList->getHead());
    $this->isEqual($singlyLinkedList->findAt(-3), $singlyLinkedList->getHead());
    $this->isEqual($singlyLinkedList->findAt(2), $singlyLinkedList->getTail());
    $this->isEqual($singlyLinkedList->findAt(-1), $singlyLinkedList->getTail());
    $this->isEqual($singlyLinkedList->findAt(5), null);
    $this->isEqual($singlyLinkedList->findAt(-6), null);

    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["c", "b", "a"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->replace("a", "d"), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->replace("b", "e")->getData(), "e");
    $this->isEqual(
      $singlyLinkedList->replace("c", "f"),
      $singlyLinkedList->getHead()
    );
    $this->isEqual(
      $singlyLinkedList->replace("a", "d"),
      $singlyLinkedList->getTail()
    );
    $this->isEqual($singlyLinkedList->getHead()->getData(), "f");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "d");
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["f", "e", "d"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->replaceAt(0, "a"), null);
    $this->isEqual($singlyLinkedList->replaceAt(1, "a"), null);
    $this->isEqual($singlyLinkedList->replaceAt(-1, "a"), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->replaceAt(1, "d")->getData(), "d");
    $this->isEqual(
      $singlyLinkedList->replaceAt(0, "e"),
      $singlyLinkedList->getHead()
    );
    $this->isEqual(
      $singlyLinkedList->replaceAt(2, "f"),
      $singlyLinkedList->getTail()
    );
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["e", "d", "f"]
    );
    $this->isEqual($singlyLinkedList->replaceAt(-2, "g")->getData(), "g");
    $this->isEqual(
      $singlyLinkedList->replaceAt(-3, "h"),
      $singlyLinkedList->getHead()
    );
    $this->isEqual(
      $singlyLinkedList->replaceAt(-1, "i"),
      $singlyLinkedList->getTail()
    );
    $this->isEqual($singlyLinkedList->replaceAt(5, "i"), null);
    $this->isEqual($singlyLinkedList->replaceAt(-6, "i"), null);
    $this->isEqual(
      $this->turnLinkedListToArray($singlyLinkedList),
      ["h", "g", "i"]
    );

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->deleteHead(), null);

    $singlyLinkedList->insertHead("a");

    $previousHead = $singlyLinkedList->getHead();
    $this->isEqual($singlyLinkedList->deleteHead(), $previousHead);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");

    $previousHead = $singlyLinkedList->getHead();
    $this->isEqual($singlyLinkedList->deleteHead(), $previousHead);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertHead("c");
    $singlyLinkedList->insertHead("d");

    $previousHead = $singlyLinkedList->getHead();
    $this->isEqual($singlyLinkedList->deleteHead(), $previousHead);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "c");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["c", "a"]);

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->deleteTail(), null);

    $singlyLinkedList->insertTail("a");

    $previousTail = $singlyLinkedList->getTail();
    $this->isEqual($singlyLinkedList->deleteTail(), $previousTail);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertTail("a");
    $singlyLinkedList->insertTail("b");

    $previousTail = $singlyLinkedList->getTail();
    $this->isEqual($singlyLinkedList->deleteTail(), $previousTail);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertTail("c");
    $singlyLinkedList->insertTail("d");

    $previousTail = $singlyLinkedList->getTail();
    $this->isEqual($singlyLinkedList->deleteTail(), $previousTail);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "c");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["a", "c"]);

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->delete("a"), null);

    $singlyLinkedList->insertHead("a");

    $previousHead = $singlyLinkedList->getHead();
    $previousTail = $singlyLinkedList->getTail();
    $deletedNode = $singlyLinkedList->delete("a");
    $this->isEqual($deletedNode, $previousHead);
    $this->isEqual($deletedNode, $previousTail);
    $this->isEqual($singlyLinkedList->getHead(), null);
    $this->isEqual($singlyLinkedList->getTail(), null);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");

    $previousHead = $singlyLinkedList->getHead();
    $this->isEqual($singlyLinkedList->delete("b"), $previousHead);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "a");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "a");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["a"]);

    $singlyLinkedList->insertHead("b");

    $previousTail = $singlyLinkedList->getTail();
    $this->isEqual($singlyLinkedList->delete("a"), $previousTail);
    $this->isEqual($singlyLinkedList->getHead()->getData(), "b");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["b"]);

    $singlyLinkedList->insertHead("c");
    $singlyLinkedList->insertHead("d");
    $singlyLinkedList->delete("c");

    $this->isEqual($singlyLinkedList->getHead()->getData(), "d");
    $this->isEqual($singlyLinkedList->getTail()->getData(), "b");
    $this->isEqual($this->turnLinkedListToArray($singlyLinkedList), ["d", "b"]);

    $singlyLinkedList = new SinglyLinkedList();

    $this->isEqual($singlyLinkedList->count(), 0);

    $singlyLinkedList->insertHead("a");
    $singlyLinkedList->insertHead("b");
    $singlyLinkedList->insertHead("c");

    $this->isEqual($singlyLinkedList->count(), 3);
  }
}
