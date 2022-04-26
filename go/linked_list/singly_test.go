package linkedlist

import (
	"testing"
)

func TestNewSingly(t *testing.T) {
	s := NewSingly()

	if s.head != nil {
		t.Errorf("Should return 'nil' for linked list head, got '%v'", s.head)
	}

	if s.tail != nil {
		t.Errorf("Should return 'nil' for linked list tail, got '%v'", s.tail)
	}
}

func TestInsertHead(t *testing.T) {
	s := NewSingly()

	head := s.InsertHead("a")

	if s.head != head {
		t.Error("Should show that singly head is equal to head")
	}

	if s.tail != head {
		t.Error("Should show that singly tail is equal to head")
	}

	if head.data != "a" {
		t.Errorf("Should return 'a' for head data, got '%v'", head.data)
	}

	if head.next != nil {
		t.Errorf("Should return 'nil' for head next, got '%v'", head.next)
	}

	newHead := s.InsertHead("b")

	if s.head != newHead {
		t.Error("Should show that singly head is equal to new head")
	}

	if s.tail != head {
		t.Error("Should show that singly tail is equal to the original head")
	}

	if newHead.next != head {
		t.Errorf(
			"Should return the original head for new head next, got '%v'",
			newHead.next,
		)
	}
}

func TestInsertTail(t *testing.T) {
	s := NewSingly()

	tail := s.InsertTail("a")

	if s.head != tail {
		t.Error("Should show that singly head is equal to tail")
	}

	if s.tail != tail {
		t.Error("Should show that singly tail is equal to tail")
	}

	if tail.data != "a" {
		t.Errorf("Should return 'a' for tail data, got '%v'", tail.data)
	}

	if tail.next != nil {
		t.Errorf("Should return 'nil' for tail next, got '%v'", tail.next)
	}

	newTail := s.InsertTail("b")

	if s.head != tail {
		t.Error("Should show that singly head is equal to original tail")
	}

	if s.tail != newTail {
		t.Error("Should show that singly tail is equal to the new tail")
	}

	if tail.next != newTail {
		t.Errorf(
			"Should return the new tail for original tail next, got '%v'",
			newTail,
		)
	}
}

func TestDeleteHead(t *testing.T) {

}

func TestDeleteTail(t *testing.T) {

}

func TestLen(t *testing.T) {

}
