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
			t.Errorf("Should return '%s' for a head data, got '%v'", value, head.data)
		}

		if head.next != next {
			t.Errorf("Should return '%v' for a head next, got '%v'", next, head.next)
		}

		if head.prev != tail {
			t.Errorf("Should return '%v' for a head prev, got '%v'", tail, head.prev)
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

}

func TestCDDeleteHead(t *testing.T) {

}

func TestCDDeleteTail(t *testing.T) {

}

func TestCDLen(t *testing.T) {

}
