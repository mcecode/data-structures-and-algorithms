// This implementation primarily diverges from the LeetCode problem in that it
// transforms the return of 'addTwoNumbers' into an array. This is mainly to
// make running tests with the current setup easier.

type NullishListNode = ListNode | null;

class ListNode {
  readonly val: number;
  readonly next: NullishListNode;

  constructor(val: number = 0, next: NullishListNode = null) {
    this.val = val;
    this.next = next;
  }
}

function linkedListToReverseString(n: NullishListNode): string {
  let s = "";

  for (let cn = n; cn !== null; cn = cn.next) {
    s = cn.val + s;
  }

  return s;
}

function linkedListToArray(n: NullishListNode): number[] {
  const a: number[] = [];

  for (let cn = n; cn !== null; cn = cn.next) {
    a.push(cn.val);
  }

  return a;
}

function arrayToLinkedList(a: number[]): NullishListNode {
  let cn: NullishListNode = null;
  let pn: NullishListNode = null;

  for (const e of a.slice().reverse()) {
    if (cn === null) {
      cn = new ListNode(e);
      continue;
    }

    pn = new ListNode(e, cn);
    cn = pn;
  }

  return pn === null ? cn : pn;
}

// Initial answer
function addTwoNumbers(l1: NullishListNode, l2: NullishListNode): number[] {
  const s1 = +linkedListToReverseString(l1);
  const s2 = +linkedListToReverseString(l2);

  let cn: NullishListNode = null;
  let pn: NullishListNode = null;

  for (let e of (s1 + s2 + "").split("")) {
    if (cn === null) {
      cn = new ListNode(+e);
      continue;
    }

    pn = new ListNode(+e, cn);
    cn = pn;
  }

  return linkedListToArray(pn === null ? cn : pn);
}

export default {
  funcs: [addTwoNumbers],
  tests: [
    // LeetCode examples
    {
      i: [arrayToLinkedList([2, 4, 3]), arrayToLinkedList([5, 6, 4])],
      o: [7, 0, 8]
    },
    {
      i: [arrayToLinkedList([0]), arrayToLinkedList([0])],
      o: [0]
    },
    {
      i: [
        arrayToLinkedList([9, 9, 9, 9, 9, 9, 9]),
        arrayToLinkedList([9, 9, 9, 9])
      ],
      o: [8, 9, 9, 9, 0, 0, 0, 1]
    },

    // Added test cases
    // Zero and nonzero
    {
      i: [arrayToLinkedList([0]), arrayToLinkedList([1, 8])],
      o: [1, 8]
    }
  ]
};
