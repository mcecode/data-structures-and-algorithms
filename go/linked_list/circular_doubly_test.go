package linkedlist

import (
	"testing"
)

func TestNewCircularDoubly(t *testing.T) {
	cd := NewCircularDoubly()

	if cd.head != nil {
		t.Errorf("Should return 'nil' for linked list head, got '%v'", cd.head)
	}

	if cd.tail != nil {
		t.Errorf("Should return 'nil' for linked list tail, got '%v'", cd.tail)
	}
}

func TestCDInsertHead(t *testing.T) {
	cd := NewCircularDoubly()

	var tail *DoublyNode
	var next *DoublyNode

	for i, value := range []string{"a", "b", "c", "d", "e"} {
		head := cd.InsertHead(value)

		if i == 0 {
			tail = head
			next = head
		}

		if head.data != value {
			t.Errorf("Should return '%s' for head data, got '%v'", value, head.data)
		}

		if head.next != next {
			t.Errorf("Should return '%v' for head next, got '%v'", next, head.next)
		}

		if head.prev != tail {
			t.Errorf("Should return '%v' for head prev, got '%v'", tail, head.prev)
		}

		if cd.head != head {
			t.Errorf("Should return '%v' for head, got '%v'", head, cd.head)
		}

		if cd.tail != tail {
			t.Errorf("Should return '%v' for tail, got '%v'", tail, cd.tail)
		}

		next = head
	}
}

func TestCDInsertTail(t *testing.T) {
	cd := NewCircularDoubly()

	var head *DoublyNode
	var prev *DoublyNode

	for i, value := range []string{"a", "b", "c", "d", "e"} {
		tail := cd.InsertTail(value)

		if i == 0 {
			head = tail
			prev = tail
		}

		if tail.data != value {
			t.Errorf("Should return '%s' for tail data, got '%v'", value, tail.data)
		}

		if tail.next != head {
			t.Errorf("Should return '%v' for tail next, got '%v'", head, tail.next)
		}

		if tail.prev != prev {
			t.Errorf("Should return '%v' for tail prev, got '%v'", prev, tail.prev)
		}

		if cd.head != head {
			t.Errorf("Should return '%v' for head, got '%v'", head, cd.head)
		}

		if cd.tail != tail {
			t.Errorf("Should return '%v' for tail, got '%v'", tail, cd.tail)
		}

		prev = tail
	}
}

func TestCDDeleteHead(t *testing.T) {

}

func TestCDDeleteTail(t *testing.T) {

}

func TestCDLen(t *testing.T) {

}
