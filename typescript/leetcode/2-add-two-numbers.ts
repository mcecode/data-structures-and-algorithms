// This implementation primarily diverges from the LeetCode problem in that it
// transforms the return of 'addTwoNumbers' into an array. This is mainly to
// make running tests with the current setup easier.
// The complexities indicated do not include the time and space used for linked
// list to array transformations.

type NullishListNode = ListNode | null;

class ListNode {
  readonly val: number;
  readonly next: NullishListNode;

  constructor(val: number = 0, next: NullishListNode = null) {
    this.val = val;
    this.next = next;
  }
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
// Time: O(n)
// Space: O(n)
function addTwoNumbers(l1: NullishListNode, l2: NullishListNode): number[] {
  let s1 = "";
  let s2 = "";

  while (l1 !== null || l2 !== null) {
    if (l1 !== null) {
      s1 = l1.val + s1;
      l1 = l1.next;
    }

    if (l2 !== null) {
      s2 = l2.val + s2;
      l2 = l2.next;
    }
  }

  let cn: NullishListNode = null;
  let pn: NullishListNode = null;

  for (let e of (+s1 + +s2 + "").split("")) {
    if (cn === null) {
      cn = new ListNode(+e);
      continue;
    }

    pn = new ListNode(+e, cn);
    cn = pn;
  }

  return linkedListToArray(pn === null ? cn : pn);
}

// Answer after viewing solution and comments
// Pretty much egorio's solution
// https://leetcode.com/problems/add-two-numbers/solutions/127833/official-solution/comments/237685
// Not as efficient as his because I made the properties of 'ListNode' readonly
// Time: O(n)
// Space: O(n)
function addTwoNumbersV2(l1: NullishListNode, l2: NullishListNode): number[] {
  let sum = 0;
  const list: number[] = [];

  while (l1 !== null || l2 !== null) {
    if (l1 !== null) {
      sum += l1.val;
      l1 = l1.next;
    }

    if (l2 !== null) {
      sum += l2.val;
      l2 = l2.next;
    }

    list.push(sum % 10);
    sum = sum > 9 ? 1 : 0;
  }

  if (sum > 0) {
    list.push(sum);
  }

  const result = arrayToLinkedList(list);
  return linkedListToArray(result);
}

export default {
  funcs: [addTwoNumbers, addTwoNumbersV2],
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
